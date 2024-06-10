<?php

namespace App\Http\Controllers;

interface ResourceInterface
{
    public function getId(): string;

    public function getType(): string;

    public function getAttributes(): array;

    public function getRelationships(): array;

    public function getLinks(): array;

    public function getMeta(): array;
}
