<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    public function freelancers()
    {
        return $this->belongsToMany('App\Freelancer');
    }
}
