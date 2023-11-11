<?php

namespace Atin\LaravelAffiliateProgram\Http\Controllers;

use App\Http\Controllers\Controller;

class AffiliateProgramController extends Controller
{
    public function index()
    {
        return view('laravel-affiliate-program::index');
    }
}
