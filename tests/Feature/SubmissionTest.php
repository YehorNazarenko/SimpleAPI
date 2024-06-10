<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SubmissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_submit_data_successfully()
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'message' => 'This is a test message.',
        ];

        $response = $this->postJson('/api/submit', $data);

        $response->assertStatus(202)
            ->assertJson(['message' => 'Submission received']);

        $this->assertDatabaseHas('submissions', $data);
    }

    public function test_fails_with_invalid_data()
    {
        $data = [
            'name' => '',
            'email' => 'invalid-email',
            'message' => '',
        ];

        $response = $this->postJson('/api/submit', $data);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['name', 'email', 'message']);
    }
}
