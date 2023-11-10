<?php

namespace Atin\LaravelAffiliateProgram\Http\Controllers;

use App\Http\Controllers\Controller;

class AffiliateProgramController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
}
