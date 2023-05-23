<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TacheNotification extends Notification
{
    use Queueable;

    public $msg;
    public function __construct($msg)
    {
        $this->msg = $msg;
    }

   
    public function via($notifiable)
    {
        return ['database'];
    }

   
    public function toArray($notifiable)
    {
        return [
            'msg' => $this->msg
        ];
    }
}
