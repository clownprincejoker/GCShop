<?php

namespace App\Notifications\CarHandler;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CarTestDrivingNotification extends Notification
{
    use Queueable;

    protected $consumer;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($consumer)
    {
        $this->consumer = $consumer;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Dear, '.$this->consumer->getFullName())
                    ->line('This is the digital reciept for the test driving session.')
                    ->line('Remember, this car can only tested between the date and time you spacified. If you miss the time slot you cant test this car anymore.')
                    ->line('Please be on time to fully enjoy the cars features.')
                    ->line('Thank you for using our application!');
    }

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
