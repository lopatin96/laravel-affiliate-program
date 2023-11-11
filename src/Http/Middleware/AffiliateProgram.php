<?php

namespace Atin\LaravelAffiliateProgram\Http\Middleware;


use Closure;
use Illuminate\Http\Request;

class AffiliateProgram
{
    public function handle(Request $request, Closure $next): mixed
    {
        if (request()->is('/') && request()->has('aff_id')) {
            request()->session()->put('aff_id', request()->get('aff_id'));
        }

        return $next($request);
    }
}
