<?php

namespace Acme\Repository;

use Acme\ChargeRules\DeliveryChargeRule;

class OffersRepository extends AbstractRepository
{
    protected string $databaseName = 'offers.json';

    /**
     * @return DeliveryChargeRule[]|array
     */
    public function findAll(): array
    {
        $rules = [];
        foreach (parent::findAll() as $item) {
            $rules[] = new $item['class']($item['productCode'], $item['discount'], $item['isActive']);
        }
        return $rules;
    }
}
