<?php

namespace Atin\LaravelAffiliateProgram;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AffiliateProgramProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        Blade::directive('money', static function ($amount) {
            return "<?php echo '$' . number_format($amount / 100, 2); ?>";
        });

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-affiliate-program');

        $this->loadTranslationsFrom(__DIR__.'/../lang', 'laravel-affiliate-program');

        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'laravel-affiliate-program');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-affiliate-program')
        ], 'laravel-affiliate-program-views');

        $this->publishes([
            __DIR__.'/../lang' => $this->app->langPath('vendor/laravel-affiliate-program'),
        ], 'laravel-affiliate-program-lang');

        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('laravel-affiliate-program.php')
        ], 'laravel-affiliate-program-config');
    }
}