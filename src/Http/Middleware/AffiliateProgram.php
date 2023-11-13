<?php

namespace Atin\LaravelAffiliateProgram\Http\Middleware;


use Closure;
use Illuminate\Http\Request;

class AffiliateProgram
{
    public function handle(Request $request, Closure $next): mixed
    {
        if (request()->is('/') && request()->has('aff_id')) {
            cookie()->queue(cookie('aff_id', request()->get('aff_id'), config('laravel-affiliate-program.cookie_life_in_minutes')));
        }

        return $next($request);
    }
}
