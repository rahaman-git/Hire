<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $fillable = [
      'name'  
    ];
    
    public function freelancers()
    {
        return $this->belongsToMany('App\Freelancer');
    }
}
