<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'title',
        'description'
    ];

    public function freelancers()
    {
        return $this->belongsTo('App\Freelancer');
    }
}
