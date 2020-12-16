<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $bodyMessage;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($bodyMessage)
    {
        $this->bodyMessage  = $bodyMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('kuswandi@scriptproject.web.id')->view('mail');
    }
}
