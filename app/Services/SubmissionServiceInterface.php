<?php

namespace App\Services;

interface SubmissionServiceInterface
{
    public function save(array $data): void;
}
