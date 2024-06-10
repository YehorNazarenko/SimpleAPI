<?php

namespace App\Repositories;

use App\Models\Submission;

class SubmissionRepository implements SubmissionRepositoryInterface
{
    public function __construct(
        private readonly Submission $model,
    ) {
    }

    public function create(array $data): Submission
    {
        return $this->model->create($data);
    }
}
