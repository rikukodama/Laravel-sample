<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Common;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(Common::class, function ($app) {
            return new Common();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
