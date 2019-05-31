<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasRoles, Notifiable, SoftDeletes;

    const ACTIVE = 1;
    const INACTIVE = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'status', 'token', 'active','subscriber_id', 'phone', 'password', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
    public function subscriber () {
        return $this->belongsTo(Subscriber::class);
    }

    
    public function sendPasswordResetNotification($token)
    {
        // Your your own implementation.
        $this->notify(new ResetPasswordNotification($token));
    }

    public function diagnosis() {
        return $this->hasMany(Diagnosis::class,  'user_id');
    }

    //  public function diagnosis(){
    //    return $this->hasMany(Diagnosis::class);
    // }

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
