<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
{
    if ($this->app->environment('production')) {

        // Memaksa Laravel pakai domain yg kita set
        URL::forceRootUrl(config('app.url'));

        // Memaksa pakai HTTPS
        URL::forceScheme('https');

        // Fix proxy / load balancer
        request()->server->set('HTTP_X_FORWARDED_PROTO', 'https');
        request()->server->set('HTTPS', 'on');
    }
}

}
