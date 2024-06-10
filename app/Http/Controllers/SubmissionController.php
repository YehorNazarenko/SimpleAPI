<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmissionRequest;
use App\Services\SubmissionServiceInterface;
use Illuminate\Http\JsonResponse;

class SubmissionController extends Controller
{
    public function __construct(private readonly SubmissionServiceInterface $submissionService)
    {
    }

    public function store(SubmissionRequest $request): JsonResponse
    {
        $this->submissionService->save($request->validated());
        return $this->responseSuccess(null, 202);
    }
}
