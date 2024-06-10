<?php

namespace App\Http\Controllers;

interface ResourceCollectionInterface
{
    public function getResources(): array;

    public function getLinks(): array;

    public function getMeta(): array;
}
