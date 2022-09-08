<?php

namespace App\Providers;

use App\Managers\Shop\IShopManager;
use App\Managers\Shop\ShopManager;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application Services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IShopManager::class, function ($app) {
            return new ShopManager($app);
        });
    }

    /**
     * Bootstrap any application Services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
