<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Laravel\Jetstream\Jetstream;

Route::get('/affiliate', [\Atin\LaravelAffiliateProgram\Http\Controllers\AffiliateProgramController::class, 'index']);

Route::view('/affiliate-terms', 'terms', ['terms' => Str::markdown(file_get_contents(resource_path('markdown/affiliate-terms.md')))]);