<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Tag extends Model
{
    /*
     * Define the many to many relationship with contacts
     */
    public function contacts()
    {
        # With timestamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany(Contact::class)->withTimestamps();
    }

    /*
     * Generate an array of tags where key = tag id and value = tag name
     */
    public static function getForCheckboxes()
    {
        $tags = self::orderBy('name')->get();
        $tagsForCheckboxes = [];
        foreach ($tags as $tag) {
            $tagsForCheckboxes[$tag->id] = $tag->name;
        }
        return $tagsForCheckboxes;
    }

    public function getRouteKeyName()
    {

        return 'name';
    }
}