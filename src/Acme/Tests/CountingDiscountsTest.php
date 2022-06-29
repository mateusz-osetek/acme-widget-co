<?php

namespace Acme\Tests;

use Acme\Controller\BasketController;
use Acme\Tests\Traits\SampleBasketTrait;

class CountingDiscountsTest extends AcmeTestCase
{
    use SampleBasketTrait;

    public function testOneRedWidget(): bool
    {
        $basket = new BasketController($this->createSampleBasket());
        $basket->add('R01');
        return $this->areFloatsEqual($basket->total() - $basket->delivery(), 32.95);
    }

    public function testTwoRedWidgets(): bool
    {
        $basket = new BasketController($this->createSampleBasket());
        $basket->add('R01');
        $basket->add('R01');
        return $this->areFloatsEqual($basket->total() - $basket->delivery(), 49.42);
    }

    public function testThreeRedWidgets(): bool
    {
        $basket = new BasketController($this->createSampleBasket());
        $basket->add('R01');
        $basket->add('R01');
        $basket->add('R01');
        return $this->areFloatsEqual($basket->total() - $basket->delivery(), 82.37);
    }

    public function testFourRedWidgets(): bool
    {
        $basket = new BasketController($this->createSampleBasket());
        $basket->add('R01');
        $basket->add('R01');
        $basket->add('R01');
        $basket->add('R01');
        return $this->areFloatsEqual($basket->total() - $basket->delivery(), 98.85);
    }
}
