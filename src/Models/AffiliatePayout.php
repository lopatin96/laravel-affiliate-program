<?php

namespace Atin\LaravelAffiliateProgram\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Atin\LaravelNovaBadges\Traits\HasNovaBadges;

class AffiliatePayout extends Model
{
    use HasNovaBadges, HasFactory;

    protected $fillable = [
        'affiliate_invoice_id',
        'amount',
    ];

    public function affiliateInvoice()
    {
        return $this->belongsTo(AffiliateInvoice::class);
    }
}
