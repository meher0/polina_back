<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class refuserMail extends Mailable
{
    use Queueable, SerializesModels;

    public  $name_tache,$cause;
    public function __construct($name_tache,$cause)
    {
        $this->name_tache = $name_tache;
        $this->cause = $cause;
    }

  
    public function build()
    {
        return $this->subject('cause recu')->view('mailing.cause');
    }
}
