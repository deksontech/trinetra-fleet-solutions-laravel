<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\JobApplicationRequest;
use App\Http\Requests\QuoteRequest;
use App\Mail\LeadReceived;
use App\Models\Career;
use App\Models\ContactSubmission;
use App\Models\JobApplication;
use App\Models\Lead;
use App\Models\LeadStatusHistory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class FormController extends Controller
{
    public function quote(QuoteRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $fingerprint = sha1(implode('|', [
            mb_strtolower($data['email']),
            preg_replace('/\D+/', '', $data['phone']),
            $data['service_type'],
            $data['pickup_date'] ?? '',
        ]));

        if ($request->session()->get('quote_fingerprint') === $fingerprint) {
            return redirect()->route('success', $request->session()->get('quote_reference'))->with('success', 'Your enquiry has already been submitted.');
        }

        $reference = $this->reference('TFS');
        $lead = Lead::create([
            'enquiry_number' => $reference,
            'customer_name' => $data['full_name'],
            'company' => $data['company_name'] ?? null,
            'email' => $data['email'],
            'phone' => $data['phone'],
            'service' => $data['service_type'],
            'pickup_location' => $data['pickup_location'] ?? null,
            'destination' => $data['destination'] ?? null,
            'pickup_date' => $data['pickup_date'] ?? null,
            'return_date' => $data['return_date'] ?? null,
            'passenger_count' => $data['passenger_count'] ?? 1,
            'luggage_count' => $data['luggage_count'] ?? 0,
            'vehicle_requirements' => trim(($data['vehicle_preference'] ?? '')."\n".($data['special_requirements'] ?? '')),
            'source' => 'Website',
            'utm_source' => $data['utm_source'] ?? $request->query('utm_source'),
            'utm_medium' => $data['utm_medium'] ?? $request->query('utm_medium'),
            'utm_campaign' => $data['utm_campaign'] ?? $request->query('utm_campaign'),
            'raw_payload' => $data,
        ]);
        LeadStatusHistory::create(['lead_id' => $lead->id, 'status' => 'New', 'changed_by' => 'System']);
        $this->sendLeadEmails($lead);
        $request->session()->put('quote_fingerprint', $fingerprint);
        $request->session()->put('quote_reference', $reference);

        return redirect()->route('success', $reference)->with('success', 'Your enquiry has been submitted.');
    }

    public function contact(ContactRequest $request): RedirectResponse
    {
        $reference = $this->reference('CNT');
        $submission = ContactSubmission::create(['reference' => $reference] + $request->validated());
        $this->sendNotification(
            'New contact request '.$reference,
            "Name: {$submission->full_name}\nEmail: {$submission->email}\nPhone: {$submission->phone}\nDepartment: {$submission->department}\n\n{$submission->message}"
        );

        return back()->with('success', 'Contact request submitted. Reference: '.$reference);
    }

    public function career(JobApplicationRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $reference = $this->reference('JOB');
        $career = Career::where('slug', $data['job_slug'])->first();
        $cvPath = $request->file('cv')?->store('cvs', 'public');
        $application = JobApplication::create([
            'reference' => $reference,
            'career_id' => $career?->id,
            'job_slug' => $data['job_slug'],
            'full_name' => $data['full_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'experience' => $data['experience'] ?? null,
            'message' => $data['message'] ?? null,
            'cv_url' => $cvPath ? '/storage/'.$cvPath : null,
            'consent' => true,
        ]);
        $this->sendNotification(
            'New career application '.$reference,
            "Name: {$application->full_name}\nEmail: {$application->email}\nPhone: {$application->phone}\nRole: {$application->job_slug}\nExperience: {$application->experience}"
        );

        return back()->with('success', 'Application submitted. Reference: '.$reference);
    }

    private function reference(string $prefix): string
    {
        return $prefix.'-'.now()->format('Ymd').'-'.Str::upper(Str::random(6));
    }

    private function sendLeadEmails(Lead $lead): void
    {
        try {
            Mail::to(env('TRINETRA_ADMIN_EMAIL', env('LEAD_NOTIFICATION_EMAIL', 'jitendra@trinetrafleet.com')))->send(new LeadReceived($lead, 'admin'));
            Mail::to($lead->email)->send(new LeadReceived($lead, 'customer'));
        } catch (\Throwable $exception) {
            report($exception);
        }
    }

    private function sendNotification(string $subject, string $body): void
    {
        try {
            Mail::raw($body, fn ($message) => $message
                ->to(env('TRINETRA_ADMIN_EMAIL', env('LEAD_NOTIFICATION_EMAIL', 'jitendra@trinetrafleet.com')))
                ->subject($subject));
        } catch (\Throwable $exception) {
            report($exception);
        }
    }
}
