<?php

require_once 'autoload.php';

use Acme\Tests\AddToBasketTest;
use Acme\Tests\CountingDiscountsTest;
use Acme\Tests\DeliveryCostsTest;
use Acme\Tests\TestCase;

run(new AddToBasketTest());
run(new CountingDiscountsTest());
run(new DeliveryCostsTest());

function run(TestCase $case)
{
    foreach (get_class_methods(get_class($case)) as $test) {
        if (in_array($test, ['__construct', 'createSampleBasket'])) {
            continue;
        }
        echo sprintf("Test `%s` is ...%s\n", $test, $case->{$test}() ? 'valid' : 'invalid');
    }
}
