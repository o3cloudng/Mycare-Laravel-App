<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Notify;

class NotifySubscriber extends Notification
{
    use Queueable;

    protected $notification;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Notify $notification)
    {
        $this->notification = $notification;
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
         /** @var Notify $notification */
        $notification = $this->notification;
        $time = $notification->time;

        return (new MailMessage)
            ->from('no-reply@mycareplus.com', 'MyCarePlus')
            ->subject('Notification - Reminder')
            ->greeting(sprintf('Hello %s', $notification->subscriber->name))
            ->line('Hello, This is to notify you of the following: ')
            ->line($notification->notification. ' ' . date('h:i a', strtotime($time)))
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
