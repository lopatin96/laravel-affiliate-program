<?php

use Illuminate\Support\Facades\Route;

Route::get('/affiliate-program', [\Atin\LaravelAffiliateProgram\Http\Controllers::class, 'index']);