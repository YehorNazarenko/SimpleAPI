<?php

namespace App\Listeners;

use App\Events\SubmissionSavedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class SubmissionSavedListener implements ShouldQueue
{
    public function handle(SubmissionSavedEvent $event): void
    {
        Log::info('Submission saved', [
            'name' => $event->submission->name,
            'email' => $event->submission->email,
            'message' => $event->submission->message,
        ]);
    }
}
