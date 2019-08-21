<?php

namespace App\Notifications;

use App\BmiGoal;
use App\ContactTeam;
use App\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Notifiables;

class ContactTeamNotify extends Notification
{
    use Queueable;
    protected $contactTeam;
    protected $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($arr)
    {
        $this->contactTeam = $arr;
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
        // dd($this->contactTeam);
        // $contactTeam = ContactTeam::find()
        // $user = User::find($this->contactTeam->subscriber_id)->get();
        return (new MailMessage)
                    // ->line('The introduction to the notification.')
                    // ->action('Notification Action', url('/'))
                    // ->line('Thank you for using our application!');
        
        ->subject('MyCarePlus: Care Invitation')
        ->greeting(sprintf('Hello %s', $this->contactTeam->name))
        ->line('Hello, This is to notify you that you have been added as a care contact on MyCraePlus by ')//.$user->name. ' '.$user->email
        ->line('Designation: '.$this->contactTeam->description)
        // ->line('Height: ' .$bmiGoal->height)
        // ->line('At this frequency: '. ucfirst($bmiGoal->frequency))
        // ->line('Hour: '. $bmiGoal->hour.':00:00')
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
