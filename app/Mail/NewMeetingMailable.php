<?php

namespace App\Mail;

use App\Models\Meeting;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewMeetingMailable extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * @var Meeting
     */
    private $meeting;

    /**
     * Create a new message instance.
     *
     * @param Meeting $meeting
     */
    public function __construct(Meeting $meeting)
    {
        $this->meeting = $meeting;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject("Une nouvelle demande de rendez-vous")
            ->from($this->meeting->email, $this->meeting->full_name)
            ->markdown('email.meeting', [
                'meeting' => $this->meeting
            ]);
    }
}
