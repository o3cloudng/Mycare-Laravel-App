<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diagnosis extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public $table = 'diagnosis';


     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    

    /*
    * 
    */
   public function subscriber(){
       return $this->belongsTo(Subscriber::class);
   }

   public function doctor() {
    return $this->belongsTo(Doctor::class);
}

    public function user() {
        return $this->belongsTo(User::class);
    }

   public function medications() {
       return $this->hasMany(Medication::class,'diagnosis_id');
   }

}
