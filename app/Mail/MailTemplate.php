<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailTemplate extends Mailable
{
    use Queueable, SerializesModels;

    public $info;
    public $subject;

    public function __construct($info, $subject)
    {
        $this->info = $info;
        $this->subject = $subject;
    }

    public function build()
    {
        return $this->markdown('emails.template')->with(['info' => $this->info, 'subject' => $this->subject])->subject($this->subject);
    }
}
