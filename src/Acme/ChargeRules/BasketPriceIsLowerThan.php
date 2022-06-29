<?php

namespace Acme\ChargeRules;

use Acme\Model\Basket;

class BasketPriceIsLowerThan implements DeliveryChargeRule
{
    private float $basketPrice;
    private float $discount;
    private bool $isActive;

    public function __construct(float $basketPrice, float $discount, bool $isActive = true)
    {
        $this->basketPrice = $basketPrice;
        $this->discount = $discount;
        $this->isActive = $isActive;
    }

    public function count(Basket $basket): ?float
    {
        if ($this->basketPrice > $basket->getProductsCost()) {
            return $this->discount;
        }
        return null;
    }

    public function isActive(): bool
    {
        return $this->isActive;
    }
}
