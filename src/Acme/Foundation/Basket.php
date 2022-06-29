<?php

namespace Acme\Foundation;

interface Basket
{
    public function add(string $productCode): void;
    public function total(): float;
}
