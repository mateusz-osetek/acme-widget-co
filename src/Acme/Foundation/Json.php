<?php

namespace Acme\Foundation;

class Json
{
    private string $json;

    public static function fromJson(string $json): self
    {
        return new self($json);
    }

    public function __construct(string $json)
    {
        $this->json = $json;
    }

    public function toArray(): array
    {
        return json_decode($this->json, true, 512, JSON_THROW_ON_ERROR);
    }
}
