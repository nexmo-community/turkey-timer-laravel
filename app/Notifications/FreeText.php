<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

class FreeText extends Notification implements ShouldQueue
{
    use Queueable;

    protected $text;
    protected $channel;

    public function __construct($text, $channel)
    {
        $this->text = $text;
        $this->channel = $channel;
    }

    public function via($notifiable)
    {
        return [$this->channel];
    }

    public function toNexmoFacebook($notifiable)
    {
        return (new \Nexmo\Notifications\Message\Text)
            ->content($this->text);
    }
}
