<?php

namespace Atin\LaravelAffiliateProgram\Models;

use Atin\LaravelAffiliateProgram\Models\AffiliateInvoice;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliatePayout extends Model
{
    use HasFactory;

    protected $fillable = [
        'affiliate_invoice_id',
        'amount',
    ];

    public function affiliateInvoice()
    {
        return $this->belongsTo(AffiliateInvoice::class);
    }
}
