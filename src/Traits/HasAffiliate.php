<?php

namespace Atin\LaravelAffiliateProgram\Traits;

use App\Models\Click;
use App\Models\Link;
use App\Models\User;
use Atin\LaravelAffiliateProgram\Models\AffiliateCommission;
use Atin\LaravelAffiliateProgram\Models\AffiliateInvoice;
use Atin\LaravelAffiliateProgram\Models\AffiliatePayout;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasAffiliate
{
    public function affiliate(): BelongsTo
    {
        return $this->belongsTo(User::class, 'aff_id');
    }

    public function affiliates(): HasMany
    {
        return $this->hasMany(User::class, 'aff_id');
    }

    public function affiliateCommissions(): HasMany
    {
        return $this->hasMany(AffiliateCommission::class);
    }

    protected function getAffiliateUrlAttribute(): string
    {
        return config('app.url') . '/?aff_id=' . auth()->id();
    }

    public function affiliatePayouts(): HasManyThrough
    {
        return $this->hasManyThrough(AffiliatePayout::class, AffiliateInvoice::class);
    }

    public function getAffiliateBalanceAttribute(): int
    {
        $amountToPay = $this->affiliateCommissions()
            ->whereDate('created_at', '<=', now()->subDays(config('laravel-affiliate-program.freeze_commissions_in_days')))
            ->get()
            ->sum(function ($commission) {
                return $commission->payout;
            });


        return $amountToPay - $this->affiliatePaid();
    }

    public function affiliatePaid(): int
    {
        return $this->affiliatePayouts()
            ->get()
            ->sum(function ($payout) {
                return $payout->amount;
            });
    }
}