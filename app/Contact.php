<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    protected $fillable = [
        'name',
        'home_phone',
        'mobile_phone',
        'address',
        'state',
        'city',
        'zip',
        'description'
    ];
}