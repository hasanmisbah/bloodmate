<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    //
    protected $fillable = [
            'name',
            'location',
            'city',
            'email',
            'mobile',
            'blood_group',            
    ];

    protected $attributes = [
       'confirmed' => 1,
    ];

}
