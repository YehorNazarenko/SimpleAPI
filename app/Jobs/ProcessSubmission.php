<?php

namespace App\Jobs;

use App\Events\SubmissionSavedEvent;
use App\Exceptions\SubmissionProcessingException;
use App\Repositories\SubmissionRepositoryInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Throwable;

class ProcessSubmission implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(protected array $data)
    {
    }

    public function handle(SubmissionRepositoryInterface $submissionRepository): void
    {
        try {
            tap(
                value: $submissionRepository->create($this->data),
                callback: static fn ($submission) => SubmissionSavedEvent::dispatch($submission)
            );
        } catch (Throwable $e) {
            throw new SubmissionProcessingException("Failed to process submission: " . $e->getMessage());
        }
    }
}
