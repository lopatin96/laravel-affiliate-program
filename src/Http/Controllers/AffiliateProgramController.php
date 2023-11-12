<?php

namespace Atin\LaravelAffiliateProgram\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AffiliateProgramController extends Controller
{
    public function index()
    {
        if (! Auth::check()) {
            abort(404);
        }

        return view('laravel-affiliate-program::index', [
            'balance' => auth()->user()->affiliateBalance,
            'commissions' => auth()->user()
                ->affiliateCommissions()
                ->latest()
                ->paginate(
                    perPage: 10,
                    pageName: 'commissions',
                ),
            'payouts' => auth()->user()
                ->affiliatePayouts()
                ->where('user_id', 1)
                ->latest('affiliate_payouts.created_at')
                ->paginate(
                    perPage: 10,
                    pageName: 'invoices',
                ),
        ]);
    }
}
