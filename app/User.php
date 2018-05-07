<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function contacts()
    {
        return $this->hasMany('App\Contact');
    }

    public function getTags()
    {
        return $this->contacts->pluck('tags')->collapse()->unique('name')->pluck('name');
    }

//    public function groups()
//    {
//        return $this->hasMany('App\Group');
//    }
//    public function tags()
//    {
//        return $this->hasMany('App\Tag');
//    }
}
