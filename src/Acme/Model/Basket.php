<?php

namespace Acme\Model;

use Acme\ChargeRules\DeliveryChargeRule;
use Acme\Offer\Offer;
use Acme\Service\Calculator\BasketDeliveryCostCalculator;
use Acme\Service\Calculator\BasketSpecialOfferCalculator;

class Basket
{
    /** @var Product[]|array */
    private array $productCatalogue;

    /** @var Product[]|array */
    private array $items = [];

    /** @var DeliveryChargeRule[]|array */
    private array $deliveryChargeRules;

    /** @var Offer[]|array  */
    private array $offers;

    public function __construct(array $productCatalogue, array $deliveryChargeRules, array $offers)
    {
        $this->productCatalogue = $productCatalogue;
        $this->deliveryChargeRules = $deliveryChargeRules;
        $this->offers = $offers;
    }

    /**
     * @return Offer[]|array
     */
    public function getOffers(): array
    {
        return $this->offers;
    }

    /**
     * @return DeliveryChargeRule[]|array
     */
    public function getDeliveryChargeRules(): array
    {
        return $this->deliveryChargeRules;
    }

    /**
     * @return Product[]|array
     */
    public function getProductCatalogue(): array
    {
        return $this->productCatalogue;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function push(Product $product): self
    {
        $this->items[] = $product;
        return $this;
    }

    public function getProductsCost(): float
    {
        $cost = 0;
        foreach ($this->items as $item) {
            $cost += $item->getPrice();
        }
        return $cost - BasketSpecialOfferCalculator::calculate($this);
    }

    public function getDeliveryCosts(): float
    {
        return BasketDeliveryCostCalculator::calculate($this);
    }
}
