<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::firstOrCreate([
            'email' => 'amushal@hotmail.com',
            'name' => 'Ala Mushal',
            'password' => Hash::make('nonono')
        ]);

        $user = User::firstOrCreate([
            'email' => 'jill@harvard.edu',
            'name' => 'Jill Harvard',
            'password' => Hash::make('helloworld')
        ]);

        $user = User::firstOrCreate([
            'email' => 'jamal@harvard.edu',
            'name' => 'Jamal Harvard',
            'password' => Hash::make('helloworld')
        ]);
    }
}