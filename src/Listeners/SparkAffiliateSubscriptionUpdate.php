<?php

namespace Atin\LaravelAffiliateProgram\Listeners;

use App\Models\User;
use Atin\LaravelAffiliateProgram\Models\AffiliateCommission;
use Spark\Events\PaymentSucceeded;
use Spark\Events\SubscriptionCancelled;
use Spark\Events\SubscriptionCreated;
use Spark\Events\SubscriptionUpdated;

class SparkAffiliateSubscriptionUpdate
{
    public function handle($event)
    {
        if ($affiliate = $event->subscription->user->affiliate) {
            AffiliateCommission::create([
                'user_id' => $affiliate->id,
                'subscription_user_id' => $event->subscription->user_id,
                'payment' => $this->getPriceInCents($event->subscription->stripe_price),
                'revenue_percent' => config('laravel-affiliate-program.revenue_percent'),
            ]);
        }
    }

    private function getPriceInCents(string $stripePrice): int
    {
        foreach (config('spark.billables.user.plans') as $plan) {
            if ($plan['monthly_id'] === $stripePrice) {
                return (float) $plan['monthly_price'] * 100; // usd to cents
            }

            if ($plan['yearly_id'] === $stripePrice) {
                return (float) $plan['monthly_price'] * 100 * 10; // usd to cents and 10 months
            }
        }

        return -1;
    }

    public function subscribe($events)
    {
        return [
            PaymentSucceeded::class => 'handle',
            SubscriptionCreated::class => 'handle',
            SubscriptionUpdated::class => 'handle',
            SubscriptionCancelled::class => 'handle',
        ];
    }
}
