<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class BloodPressure extends Model
{
    use SoftDeletes;
    public $table = 'blood_pressures';
    public $guarded = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * belongs to subscriber
     */
    public function subscriber(){
        return $this->belongsTo(Subscriber::class);
    }
}
