<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminNotification extends Notification
{
    use Queueable;

    public $subject;
    public $recipientType;
    public $content;

    public function __construct($subject, $content,$recipientType)
    {
        $this->subject = $subject;
        $this->content = $content;
        $this->recipientType = $recipientType;
    }

    public function toDatabase($notifiable)
    {
        return [
            'subject' => $this->subject,
            'content' => $this->content,
            'recipientType' => $this->recipientType,
        ];
    }
    // Add the via method
    public function via($notifiable)
    {
        return ['database']; // This indicates that the notification should be stored in the database
    }

}
