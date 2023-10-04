<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LaravelTelegramNotification extends Notification
{
    use Queueable;

    protected $appName;
    protected $ip;
    protected $time;
    protected $user;
    protected $errorMessage;

    public function __construct($appName, $ip, $time, $user, $errorMessage)
    {
        $this->appName = $appName;
        $this->ip = $ip;
        $this->time = $time;
        $this->user = $user;
        $this->errorMessage = $errorMessage;
    }

    public function toTelegram($notifiable)
    {
        $message = "Error Notification\n";
        $message .= "App Name: " . $this->appName . "\n";
        $message .= "IP Address: " . $this->ip . "\n";
        $message .= "Time: " . $this->time . "\n";
        $message .= "User: " . $this->user . "\n";
        $message .= "Error Message:\n" . $this->errorMessage;

        return TelegramMessage::create()
            ->content($message);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */

    // public function toTelegram() {
    //     return (new TelegramMessage())
    //         ->text($this->data['text']);
    // }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
