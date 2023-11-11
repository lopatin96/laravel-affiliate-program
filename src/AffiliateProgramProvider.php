<?php

namespace Atin\LaravelAffiliateProgram;

use Illuminate\Support\ServiceProvider;

class AffiliateProgramProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-affiliate-program');

        $this->loadViewsFrom(__DIR__.'/../resources/markdown', 'laravel-affiliate-program');


//        $this->loadTranslationsFrom(__DIR__.'/../lang', 'laravel-subscription');
//        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'laravel-subscription');
//
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-affiliate-program')
        ], 'laravel-affiliate-program-views');
//
//        $this->publishes([
//            __DIR__.'/../lang' => $this->app->langPath('vendor/laravel-subscription'),
//        ], 'laravel-subscription-lang');
//
//        $this->publishes([
//            __DIR__.'/../config/config.php' => config_path('laravel-subscription.php')
//        ], 'laravel-subscription-config');
    }
}