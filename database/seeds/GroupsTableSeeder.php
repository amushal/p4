<?php

use Illuminate\Database\Seeder;
use App\Group;


class GroupsTableSeeder extends Seeder
{
    public function run()
    {
        # Array of author data to add
        $groups = [
            ['Family'],
            ['Favorites'],
            ['Friends'],
            ['Work']

        ];
        $count = count($groups);
        # Loop through each group, adding them to the database
        foreach ($groups as $groupData) {
            $group = new Group();
            $group->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $group->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $group->name = $groupData[0];
            $group->save();
            $count--;
        }
    }
}