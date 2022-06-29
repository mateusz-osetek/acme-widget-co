<?php

namespace Acme\Service\Calculator;

use Acme\Model\Basket;

class BasketSpecialOfferCalculator
{
    public static function calculate(Basket $basket)
    {
        $discount = 0;
        foreach ($basket->getOffers() as $offer) {
            if (false === $offer->isActive()) {
                continue;
            }
            $discount += $offer->count($basket);
        }
        return $discount;
    }
}
