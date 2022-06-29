<?php

namespace Acme\Service\Calculator;

use Acme\Model\Basket;

class BasketDeliveryCostCalculator
{
    /**
     * @throws \Exception
     */
    public static function calculate(Basket $basket): float
    {
        $discount = null;
        foreach ($basket->getDeliveryChargeRules() as $chargeRule) {
            if (false === $chargeRule->isActive()) {
                continue;
            }
            if (null !== $discount) {
                break;
            }
            $discount = $chargeRule->count($basket);
        }

        if (null === $discount) {
            throw new \Exception("Can't find any delivery charge rules for basket");
        }

        return $discount;
    }
}
