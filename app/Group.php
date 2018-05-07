<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Group extends Model
{
    /*
     * Define the one to many relationship with contacts
     */
    public function contacts()
    {
        # Group has many Contacts
        # Define a one-to-many relationship.
        return $this->hasMany('App\Contact');
    }

    /**
     * Return an array of groups where key = group id and value = groups name
     */
    public static function getForDropdown()
    {
        $groups = self::orderBy('name')->get();
        $groupsForDropdown = [];
        foreach ($groups as $group) {
            $groupsForDropdown[$group->id] = $group->getName();
        }
        return $groupsForDropdown;
    }

    /*
     * Return group name
     */
    public function getName() {
            return $this->name;
    }
}