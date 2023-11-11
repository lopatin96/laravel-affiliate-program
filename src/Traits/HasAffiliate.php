<?php

namespace Atin\LaravelAffiliateProgram\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasAffiliate
{
    public function affiliates(): HasMany
    {
        return $this->hasMany(User::class, 'aff_id');
    }

    public function affiliateFor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'aff_id');
    }

    protected function getAffiliateUrlAttribute(): string
    {
        return config('app.url') . '/aff_id=' . auth()->id();
    }
}