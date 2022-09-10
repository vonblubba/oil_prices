<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\PriceTagUpdater;
use App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        PriceTagUpdater::perform();

        # For some reason this is't working as expected.
        # Hope I'll have some tome to look into it later.
        // $this->app->singleton('HelpSpot\API', function ($app) {
        //     return PriceTagUpdater::perform();
        // });
    }
}
