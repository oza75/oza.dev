<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\SerializesModels;

class NewContactMailable extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * @var Contact
     */
    private $contact;

    /**
     * Create a new message instance.
     *
     * @param Contact $contact
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): NewContactMailable
    {
        return $this
            ->subject("Une nouvelle demande de contact")
            ->from($this->contact->email, $this->contact->full_name)
            ->markdown('email.contact', [
                'contact' => $this->contact
            ]);
    }
}
