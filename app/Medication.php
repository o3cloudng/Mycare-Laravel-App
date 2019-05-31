<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medication extends Model
{
    use SoftDeletes;
    protected $guarded = [];

     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function subscriber() {
        return $this->belongsTo(Subscriber::class);
    }

    
    public function diagnosis() {
        return $this->belongsTo(Diagnosis::class);
    }


}
