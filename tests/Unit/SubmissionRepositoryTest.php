<?php

namespace Tests\Unit;

use App\Models\Submission;
use App\Repositories\SubmissionRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SubmissionRepositoryTest extends TestCase
{
    use RefreshDatabase;

    protected SubmissionRepository $repository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = resolve(SubmissionRepository::class);
    }

    public function test_create_submission(): void
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'message' => 'This is a test message.',
        ];

        $submission = $this->repository->create($data);

        $this->assertInstanceOf(Submission::class, $submission);
        $this->assertEquals($data['name'], $submission->name);
        $this->assertEquals($data['email'], $submission->email);
        $this->assertEquals($data['message'], $submission->message);
    }
}
