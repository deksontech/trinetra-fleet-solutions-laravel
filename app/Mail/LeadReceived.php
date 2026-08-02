<?php

namespace App\Mail;

use App\Models\Lead;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LeadReceived extends Mailable
{
    use Queueable, SerializesModels;
    public function __construct(public Lead $lead, public string $audience = 'admin') {}
    public function build(): self
    {
        return $this->subject($this->audience === 'admin' ? 'New enquiry '.$this->lead->enquiry_number : 'Enquiry received: '.$this->lead->enquiry_number)
            ->view('emails.lead-received');
    }
}
