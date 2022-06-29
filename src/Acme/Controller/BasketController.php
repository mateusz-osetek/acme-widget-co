<?php

namespace Acme\Controller;

use Acme\Model\Basket;
use Acme\Model\Product;

class BasketController implements \Acme\Foundation\Basket
{
    private Basket $basket;

    public function __construct(Basket $basket)
    {
        $this->basket = $basket;
    }

    public function add(string $productCode): void
    {
        $product = array_filter($this->basket->getProductCatalogue(), function (Product $product) use ($productCode) {
            return $product->getCode() === $productCode;
        });

        if ([] === $product) {
            throw new \Exception(sprintf("There's no product with code `%s` in catalogue.", $productCode));
        }

        $this->basket->push(reset($product));
    }

    public function total(): float
    {
        return $this->basket->getProductsCost() + $this->basket->getDeliveryCosts();
    }

    public function delivery(): float
    {
        return $this->basket->getDeliveryCosts();
    }
}
