<?php

namespace Tests\Unit;

use App\Managers\Shop\IShopManager;
use Illuminate\Contracts\Container\BindingResolutionException;
use Tests\TestCase;

class ShopManagerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_can_use_ebay_service(): void
    {
        $factory = app(IShopManager::class);
        $service = $factory->make('ebay');
        $products = $service->getProducts();
        dump($products);
        self::assertEquals([
            'Ebay Product Sample #1',
            'Ebay Product Sample #2',
            'Ebay Product Sample #3',
        ], $products);
    }

    public function test_can_use_amazon_service(): void
    {
        $factory = app(IShopManager::class);
        $service = $factory->make('amazon');
        $products = $service->getProducts();
        dump($products);
        self::assertEquals([
            'Amazon Product Sample #1',
            'Amazon Product Sample #2',
            'Amazon Product Sample #3',
        ], $products);
    }

    /**
     * @throws BindingResolutionException
     */
    public function test_can_use_thamelmart_service(): void
    {
        $factory = app(IShopManager::class);
        $service = $factory->make('thamelmart');
        $products = $service->getProducts();
        dump($products);
        self::assertEquals([
            'Thamelmart Product Sample #1',
            'Thamelmart Product Sample #2',
            'Thamelmart Product Sample #3',
        ], $products);
    }
}
