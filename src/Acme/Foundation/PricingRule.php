<?php

namespace Acme\Foundation;

use Acme\Model\Basket;

interface PricingRule
{
    public function count(Basket $basket): ?float;
    public function isActive(): bool;
}
