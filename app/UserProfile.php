<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'description',
        'freelancer_id',
        'image_name',
        'image_path',
        'created_by'
    ];

    public function of()
    {
        return $this-> belongsTo('App\Freelancer','id');
    }
}
