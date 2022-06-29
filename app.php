<?php

require_once 'autoload.php';

$productCatalogRepository = new Acme\Repository\ProductCatalogRepository();
$chargeRulesRepository = new Acme\Repository\ChargeRulesRepository();
$offersRepository = new Acme\Repository\OffersRepository();
$basketController = new \Acme\Controller\BasketController(new \Acme\Model\Basket(
    $productCatalogRepository->findAll(),
    $chargeRulesRepository->findAll(),
    $offersRepository->findAll(),
));

foreach ($argv as $key => $argument) {
    if (0 === $key) {
        continue;
    }
    $basketController->add((string) $argument);
}

echo sprintf("Total of order: %f$", $basketController->total());
