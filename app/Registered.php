<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registered extends Model
{
    public function department()
    {
        return $this->belongsTo('App\Department');
    }

}
