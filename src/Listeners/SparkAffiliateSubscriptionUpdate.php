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
                'payment' => 12500,
                'commission' => 10000,
                'revenue_percent' => config('laravel-affiliate-program.revenue_percent'),
            ]);
        }
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
