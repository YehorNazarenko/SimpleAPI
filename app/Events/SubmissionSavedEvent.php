<?php

namespace App\Events;

use App\Models\Submission;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SubmissionSavedEvent
{
    use Dispatchable, SerializesModels;

    public function __construct(public Submission $submission)
    {
    }
}
