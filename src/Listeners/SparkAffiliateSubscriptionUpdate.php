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
    public function handleSubscriptionCreated($event): void
    {
        $this->handlePaymentSucceeded($event);
    }

    public function handleSubscriptionUpdated($event): void
    {
        $affiliate = $event->subscription->user->affiliate;

        if (is_null($affiliate)) {
            return;
        }

        $affiliateCommission = AffiliateCommission::where('user_id', $affiliate->id)
            ->where('subscription_user_id', $event->subscription->user_id)
            ->latest()
            ->first();

        if (is_null($affiliateCommission)) {
            return;
        }

        $affiliateCommission->update([
            'payment' => $this->getPriceInCents($event->subscription->stripe_price),
            'revenue_percent' => config('laravel-affiliate-program.revenue_percent'),
        ]);
    }

    public function handlePaymentSucceeded($event)
    {
        $affiliate = $event->subscription->user->affiliate;

        if (is_null($affiliate)) {
            return;
        }

        if ($event->subscription->stripe_status !== 'active') {
            return;
        }

        AffiliateCommission::create([
            'user_id' => $affiliate->id,
            'subscription_user_id' => $event->subscription->user_id,
            'payment' => $this->getPriceInCents($event->subscription->stripe_price),
            'revenue_percent' => config('laravel-affiliate-program.revenue_percent'),
        ]);
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

    public function subscribe($events): array
    {
        return [
            SubscriptionCreated::class => 'handleSubscriptionCreated',
            SubscriptionUpdated::class => 'handleSubscriptionUpdated',
//            SubscriptionCancelled::class => 'handleSubscriptionCancelled',
            PaymentSucceeded::class => 'handlePaymentSucceeded',
        ];
    }
}
