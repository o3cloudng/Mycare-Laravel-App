<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\BmiGoal;
use Carbon\Carbon;

class BMIGoalNotify extends Notification
{
    use Queueable;
    protected $bmiGoal;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(BmiGoal $bmiGoal)
    {
        $this->bmiGoal = $bmiGoal;
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
        $bmiGoal = $this->bmiGoal;
        return (new MailMessage)
                // ->from('noreply@mycareplus.com', 'MyCarePlus')
                ->subject('Body Mass Index Goal Reminder')
                ->greeting(sprintf('Hello %s', $bmiGoal->subscriber->name))
                ->line('Hello, This is to notify you that you set a Body Mass Index Goal of the following: ')
                ->line('Weight: '.$bmiGoal->weight)
                ->line('Height: ' .$bmiGoal->height)
                ->line('At this frequency: '. ucfirst($bmiGoal->frequency))
                ->line('Hour: '. $bmiGoal->hour.':00:00')
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
