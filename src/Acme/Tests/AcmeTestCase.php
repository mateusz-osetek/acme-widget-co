<?php

namespace Acme\Tests;

abstract class AcmeTestCase implements TestCase
{
    protected function areFloatsEqual(float $actual, float $expected): bool
    {
        return round($actual, 2) === round($expected, 2);
    }
}
