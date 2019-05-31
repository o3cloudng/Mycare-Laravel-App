<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Cholesterol extends Model
{
    use Notifiable;

    protected $guarded = [];

    public function subscriber() {
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
