<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendPassword extends Mailable
{
    use Queueable, SerializesModels;

    public  $password;
    public function __construct($password)
    {
        $this->password = $password;
    }

    public function build()
    {
        return $this->subject('password Recu')->view('mailing.show_password');
        
    }
}
