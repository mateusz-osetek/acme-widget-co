<?php

namespace Acme\Tests\Traits;

use Acme\Model\Basket;
use Acme\Repository\ChargeRulesRepository;
use Acme\Repository\OffersRepository;
use Acme\Repository\ProductCatalogRepository;

trait SampleBasketTrait
{
    public function createSampleBasket(): Basket
    {
        $productCatalogRepository = new ProductCatalogRepository();
        $chargeRulesRepository = new ChargeRulesRepository();
        $offersRepository = new OffersRepository();

        return new Basket(
            $productCatalogRepository->findAll(),
            $chargeRulesRepository->findAll(),
            $offersRepository->findAll(),
        );
    }
}
