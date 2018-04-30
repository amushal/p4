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
        'city',
        'state',
        'zip',
        'description'
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
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
    /*
    * Dump the essential details of contacts to the page
    * Used when practicing queries and you want to quickly see the contacts in the database
    * Can accept a Collection of contacts, or if none is provided, will default to all contacts
    */
    public static function dump($contacts = null)
    {
        # Empty array that will hold all our book data
        $data = [];
        # Determine if we should use $contacts as was passed to this method
        # or query for all contacts
        if (is_null($contacts)) {
            # Query for all the contacts
            $contacts = self::all();
        }
        # Load the data array with the contact info we want
        foreach ($contacts as $contact) {
            $data[] = $contact->name . ' by ' . $contact->group;
        }
        dump($data);
    }

}