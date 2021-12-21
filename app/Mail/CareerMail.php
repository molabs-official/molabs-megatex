<?php

namespace App\Mail;

use App\Models\Career;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class CareerMail extends Mailable
{
    use Queueable, SerializesModels;

    private $career;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Career $career)
    {
        $this->career = $career;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $career = $this->career;
        $url = asset('Career/Documents');
        $document = $url.'/'.$career->document;
        return $this->from($career->email)->markdown('emails.career_mail')->attach($url, [
            'as' => '$career->document',
            'mime' => 'application/pdf'
        ]);
    }
}
