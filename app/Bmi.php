<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bmi extends Model
{
    use  SoftDeletes;
    public $table = 'bmis';
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
        return $this->belongsTO(Subscriber::class);
    }
}
