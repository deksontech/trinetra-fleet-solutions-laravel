<?php

namespace Tests\Feature;

use App\Models\Lead;
use App\Models\ContactSubmission;
use App\Models\JobApplication;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
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

    public function test_contact_submission_creates_contact_record(): void
    {
        Mail::fake();

        $this->from('/contact')->post('/contact', [
            'department' => 'General Enquiry',
            'full_name' => 'Contact Customer',
            'email' => 'contact@example.com',
            'phone' => '+91 9999999998',
            'message' => 'Please contact me about a corporate transport requirement.',
            'consent' => '1',
        ])->assertRedirect('/contact');

        $this->assertDatabaseHas('contact_submissions', [
            'email' => 'contact@example.com',
            'department' => 'General Enquiry',
        ]);

        $this->assertNotNull(ContactSubmission::where('email', 'contact@example.com')->first()->reference);
    }

    public function test_career_application_creates_record_and_stores_cv(): void
    {
        $this->seed();
        Storage::fake('public');

        $this->from('/careers/professional-chauffeur')->post('/careers/apply', [
            'job_slug' => 'professional-chauffeur',
            'full_name' => 'Career Applicant',
            'email' => 'career@example.com',
            'phone' => '+91 9999999997',
            'experience' => '5 years',
            'message' => 'I am interested in the chauffeur role.',
            'cv' => UploadedFile::fake()->create('resume.pdf', 128, 'application/pdf'),
            'consent' => '1',
        ])->assertRedirect('/careers/professional-chauffeur');

        $application = JobApplication::where('email', 'career@example.com')->first();

        $this->assertNotNull($application);
        $this->assertNotNull($application->reference);
        $this->assertNotNull($application->cv_url);
        Storage::disk('public')->assertExists(str_replace('/storage/', '', $application->cv_url));
    }
}
