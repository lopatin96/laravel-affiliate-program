<?php

namespace Atin\LaravelAffiliateProgram\Models;

use App\Models\User;
use App\Models\UserStats;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Atin\LaravelNovaBadges\Traits\HasNovaBadges;

class AffiliateInvoice extends Model
{
    use HasNovaBadges, HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function affiliatePayout()
    {
        return $this->hasOne(AffiliatePayout::class);
    }
}
