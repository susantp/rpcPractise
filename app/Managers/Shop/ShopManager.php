<?php

namespace App\Managers\Shop;

use App\Services\Shop\AmazonShopService;
use App\Services\Shop\EbayShopService;
use App\Services\Shop\IShopService;
use App\Services\Shop\ThamelmartShopService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class ShopManager implements IShopManager
{
    private array $shops = [];
    private Application $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * @throws Exception
     */
    public function make($name): IShopService
    {
        $service = Arr::get($this->shops, $name);
        if ($service) {
            return $service;
        }
        $createMethod = 'create'.ucfirst($name).'ShopService';
        if (!method_exists($this, $createMethod)) {
            throw new Exception("Shop $name is not supported");
        }
        $service = $this->{$createMethod}();
        $this->shops[$name] = $service;

        return $service;
    }

    private function createEbayShopService(): EbayShopService
    {
        dump('creating EbayShopService');
        $config = $this->app['config']['shops.ebay'];
        return new EbayShopService($config);
    }

    private function createAmazonShopService(): AmazonShopService
    {
        dump('creating AmazonShopService');
        $config = $this->app['config']['shops.amazon'];
        return new AmazonShopService($config);
    }

    private function createThamelmartShopService(): ThamelmartShopService
    {
        dump('creating ThamelmartShopService');
        $config = $this->app['config']['shops.thamelmart'];
        return new ThamelmartShopService($config);
    }
}
