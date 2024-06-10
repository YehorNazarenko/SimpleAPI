<?php

namespace Tests\Unit;

use App\Jobs\ProcessSubmission;
use App\Services\SubmissionService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class SubmissionServiceTest extends TestCase
{
    use RefreshDatabase;

    protected SubmissionService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = resolve(SubmissionService::class);
    }

    public function test_save_dispatches_job(): void
    {
        Queue::fake();

        $data = [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'message' => 'This is a test message.',
        ];

        $this->service->save($data);

        Queue::assertPushed(ProcessSubmission::class);
    }
}
