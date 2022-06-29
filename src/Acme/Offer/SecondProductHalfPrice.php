<?php

namespace Acme\Offer;

use Acme\Model\Basket;
use Acme\Model\Product;

class SecondProductHalfPrice implements Offer
{
    private string $productCode;
    private float $discount;
    private bool $isActive;

    /**
     * @param float $discount use it as percentage divided by 100
     */
    public function __construct(string $productCode, float $discount, bool $isActive = true)
    {
        $this->productCode = $productCode;
        $this->discount = $discount;
        $this->isActive = $isActive;
    }

    public function count(Basket $basket): ?float
    {
        $applicableProducts = array_filter($basket->getItems(), function (Product $product) {
            return $product->getCode() === $this->productCode;
        });

        if ([] === $applicableProducts) {
            return 0;
        }

        /** @var Product $product */
        $product = reset($applicableProducts);
        return round((floor(count($applicableProducts) / 2) * $product->getPrice()) * $this->discount, 2);
    }

    public function isActive(): bool
    {
        return $this->isActive;
    }
}
