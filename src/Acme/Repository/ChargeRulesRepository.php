<?php

namespace Acme\Repository;

use Acme\ChargeRules\DeliveryChargeRule;

class ChargeRulesRepository extends AbstractRepository
{
    protected string $databaseName = 'charge_rules.json';

    /**
     * @return DeliveryChargeRule[]|array
     */
    public function findAll(): array
    {
        $rules = [];
        foreach (parent::findAll() as $item) {
            $rules[] = new $item['class']($item['basketPrice'], $item['discount'], $item['isActive']);
        }
        return $rules;
    }
}
