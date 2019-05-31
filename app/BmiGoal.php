<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class BmiGoal extends Model
{
    use Notifiable;
    
    protected $guarded = [];

    

    /**
     * belongs to a subsccriber
     */
    public function subscriber(){
        return $this->belongsTo(Subscriber::class);
    }

    
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
