<?php

namespace App\Services\Shop;

class ThamelmartShopService implements IShopService
{
    private $config;

    public function __construct($config)
    {
        dump("Thamelmart config was set in constructor...");
        $this->config = $config;
        dump($this->config);
    }

    public function getProducts(): array
    {
        return [
            'Thamelmart Product Sample #1',
            'Thamelmart Product Sample #2',
            'Thamelmart Product Sample #3',
        ];
    }
}
