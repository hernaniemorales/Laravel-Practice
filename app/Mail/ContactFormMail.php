<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    // initializa the field
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    // accepts the $data from the ContactFormController
    public function __construct($data)
    {
        //
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
                                // calls the contact-form
        return $this->markdown('emails.contact.contact-form');
    }
}
