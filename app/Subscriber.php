<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Spatie\Permission\Traits\HasRoles;

class Subscriber extends Model

{
    use Notifiable, SoftDeletes, HasRoles;


    protected $guard_name = 'web'; // Spatie Adding guard

    public $table = 'subscribers';

    
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    /*
    * subscriber has many diagnosis
    */
    public function diagnosis(){
       return $this->hasMany(Diagnosis::class);
    }

    /**
    * subscriber has one doctor
    */
    public function doctor(){
       return $this->hasOne(Doctor::class);
    }

    /**
     * subscriber has one emeregency contact
     */
    public function emergencyContact(){
        return $this->hasMany('\App\EmergencyContact','subscriber_id');
    }

    /**
     * has many bp readings
     */
    public function bloodPressure(){
       return $this->hasMany('\App\BloodPressure','subscriber_id');
    }

    /**
     * has many bg readings
     */
    public function bloodGlucose(){
        return $this->hasMany('\App\BloodGlucose','subscriber_id');
     }

    /**
     * has many notifications
     */
    public function notification(){
        return $this->hasMany('\App\Notify','subscriber_id');
    }

    /**
     * has one bmi
     */
    public function bmi(){
        return $this->hasOne(Bmi::class);
    }

    /**
     * Route notifications for the Nexmo channel.
     *
     * @param  \Illuminate\Notifications\Notify  $notification
     * @return string
     */
    public function routeNotificationForNexmo($notification)
    {
        return $this->phone;
    }

    public function cholesterol() {
        return $this->hasOne(Cholesterol::class);
    }

    /**
    * Accessor for Age.
    */
    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['date_of_birth'])->age;
    }

}

