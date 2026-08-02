<?php

namespace Tests\Feature;

use App\Models\Lead;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class FormSubmissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_quote_submission_creates_lead(): void
    {
        $this->seed();
        Mail::fake();

        $this->post('/request-a-quote', [
            'full_name' => 'Test Customer',
            'email' => 'customer@example.com',
            'phone' => '+91 9999999999',
            'service_type' => 'Corporate Car Rental',
            'pickup_location' => 'Delhi',
            'vehicle_preference' => 'Sedan',
            'special_requirements' => 'Airport transfer',
            'consent' => '1',
        ])->assertRedirect();

        $this->assertDatabaseHas('leads', [
            'email' => 'customer@example.com',
            'status' => 'New',
        ]);

        $this->assertNotNull(Lead::first()->enquiry_number);
    }

    public function test_quote_submission_validates_required_fields(): void
    {
        $this->from('/request-a-quote')
            ->post('/request-a-quote', [])
            ->assertRedirect('/request-a-quote')
            ->assertSessionHasErrors(['full_name', 'email', 'phone', 'service_type']);
    }
}
