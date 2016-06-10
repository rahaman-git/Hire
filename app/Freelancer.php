<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Freelancer extends Authenticatable
{
    protected $guard = "freelancers";

    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function fields()
    {
        return $this->belongsToMany('App\Field')->withTimestamps();
    }

    public function fieldList()
    {
            return $this->fields->lists('id');
    }

    public function profile()
    {
        return $this->hasOne('App\UserProfile', 'freelancer_id');
    }

    public function experiences()
    {
        return $this->hasMany('App\Experience', 'freelancer_id');
    }
}
