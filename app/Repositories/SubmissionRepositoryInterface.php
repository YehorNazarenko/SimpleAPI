<?php

namespace App\Repositories;

use App\Models\Submission;

interface SubmissionRepositoryInterface
{
    public function create(array $data): Submission;
}
