<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    public function fields()
    {
        return $this->belongsToMany('App\Field')->withTimestamps();
    }
}
