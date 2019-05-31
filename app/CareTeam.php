<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CareTeam extends Model
{
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function subscriber() {
        return $this->belongsTo(Subscriber::class);
    }
}
