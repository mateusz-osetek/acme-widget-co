<?php

namespace Acme\Tests;

use Acme\Controller\BasketController;
use Acme\Tests\Traits\SampleBasketTrait;

class AddToBasketTest extends AcmeTestCase
{
    use SampleBasketTrait;

    public function testFirstExampleBasket(): bool
    {
        $basket = new BasketController($this->createSampleBasket());
        $basket->add('B01');
        $basket->add('G01');
        return $this->areFloatsEqual($basket->total(), 37.85);
    }

    public function testSecondExampleBasket(): bool
    {
        $basket = new BasketController($this->createSampleBasket());
        $basket->add('R01');
        $basket->add('R01');
        return $this->areFloatsEqual($basket->total(), 54.37);
    }

    public function testThirdExampleBasket(): bool
    {
        $basket = new BasketController($this->createSampleBasket());

        $basket->add('R01');
        $basket->add('G01');
        return $this->areFloatsEqual($basket->total(), 60.85);
    }

    public function testFourthExampleBasket(): bool
    {
        $basket = new BasketController($this->createSampleBasket());
        $basket->add('B01');
        $basket->add('B01');
        $basket->add('R01');
        $basket->add('R01');
        $basket->add('R01');
        return $this->areFloatsEqual($basket->total(), 98.27);
    }
}
