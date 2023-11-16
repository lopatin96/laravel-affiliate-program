<?php

namespace Atin\LaravelAffiliateProgram\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Atin\LaravelNovaBadges\Traits\HasNovaBadges;

class AffiliateCommission extends Model
{
    use HasNovaBadges, HasFactory;

    protected $fillable = [
        'user_id',
        'subscription_user_id',
        'payment',
        'revenue_percent',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subscriptionUser()
    {
        return $this->belongsTo(User::class);
    }

    protected function getCommissionAttribute(): int
    {
        return round($this->payment * ((100 - config('laravel-affiliate-program.vat_percent')) / 100));
    }

    protected function getPayoutAttribute(): int
    {
        return round($this->commission * $this->revenue_percent / 100);
    }
}
