<?php

namespace App\Mail;

use App\Models\ContactUs;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUsMail extends Mailable
{
    use Queueable, SerializesModels;

    private $contact;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContactUs $contactUs)
    {
        $this->contact = $contactUs;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $contact = $this->contact;
        return $this->from($contact->email)->markdown('emails.contact_us', [
            'contact' => $contact,
        ]);
    }
}
