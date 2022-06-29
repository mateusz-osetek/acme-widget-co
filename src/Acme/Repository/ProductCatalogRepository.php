<?php

namespace Acme\Repository;

use Acme\Model\Product;

class ProductCatalogRepository extends AbstractRepository
{
    protected string $databaseName = 'product_catalog.json';

    /**
     * @return Product[]|array
     */
    public function findAll(): array
    {
        $products = [];
        foreach (parent::findAll() as $item) {
            $products[] = new Product($item['code'], $item['name'], $item['price']);
        }
        return $products;
    }
}
