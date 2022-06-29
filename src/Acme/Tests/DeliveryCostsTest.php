<?php

namespace Acme\Tests;

use Acme\Controller\BasketController;
use Acme\Tests\Traits\SampleBasketTrait;

class DeliveryCostsTest extends AcmeTestCase
{
    use SampleBasketTrait;

    public function testBasketUnderFifty(): bool
    {
        $basket = new BasketController($this->createSampleBasket());
        $basket->add('R01');
        return $this->areFloatsEqual($basket->delivery(), 4.95);
    }

    public function testBasketUnderNinety(): bool
    {
        $basket = new BasketController($this->createSampleBasket());
        $basket->add('R01');
        $basket->add('G01');
        return $this->areFloatsEqual($basket->delivery(), 2.95);
    }

    public function testBasketOverNinety(): bool
    {
        $basket = new BasketController($this->createSampleBasket());
        $basket->add('R01');
        $basket->add('G01');
        $basket->add('G01');
        $basket->add('G01');
        $basket->add('G01');
        return $this->areFloatsEqual($basket->delivery(), 0);
    }
}
