<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class BloodGlucoseGoal extends Model
{
    //
    use Notifiable;
    
    protected $guarded = [];

    

    /**
     * Route notifications for the mail channel.
     *
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return string
     */
    public function routeNotificationForMail($notification)
    {
        return $this->subscriber->email;
    }
}
