<?php

namespace Acme\Repository;

use Acme\Foundation\Json;

abstract class AbstractRepository implements Repository
{
    protected string $databaseName = '';

    public function findAll(): array
    {
        return Json::fromJson(file_get_contents(__DIR__.'/../Resources/'.$this->databaseName))->toArray();
    }
}
