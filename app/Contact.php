<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    protected $fillable = [
        'name',
        'email',
        'mobile_phone',
        'home_phone',
        'address',
        'city',
        'state',
        'zip',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function group()
    {
        # Contact belongs to Group
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('App\Group');
    }

    public function tags()
    {
        # With timestamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}