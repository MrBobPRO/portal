<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendCredentials extends Mailable
{
    use Queueable, SerializesModels;

    public $nickname, $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nickname, $password)
    {
        $this->nickname = $nickname;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('templates.mail');
    }
}
