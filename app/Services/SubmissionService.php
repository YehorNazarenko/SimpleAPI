<?php

namespace App\Services;

use App\Jobs\ProcessSubmission;

class SubmissionService implements SubmissionServiceInterface
{

    public function save(array $data): void
    {
        ProcessSubmission::dispatch($data);
    }
}
