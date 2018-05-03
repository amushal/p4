<?php

use Illuminate\Database\Seeder;
use App\Contact;
use App\User;
use App\Group;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //name, home, mobile, addr, city, state, zip, desc
        $contacts = [
            ['Ala Mushal', 'ala@mushal.me', '858-222-3912','858-231-3526', '12190 Rolling Meadows Ct', 'San Diego', 'CA', '92128'],
            ['Richard Roe', 'richard@gmail.com','274-621-2202','484-555-1053', '1272 Lakin Street', 'Poway', 'CA', '92064'],
            ['John Smith', 'john@yahoo.com','313-555-3912','313-555-3526', '12361 Twin Peaks Lake Dr', 'Ann Arbor', 'MI', '48084'],
            ['Jane Doe', 'jane@hotmail.com', '631-816-1673','734-384-1845', '2182 Terry Forge', 'San Diego', 'CA', '92128'],
            ['Larry Loe', 'larry@hotmail.com', '610-555-3912','610-555-4629', '979 Kessler Lights', 'Plano', 'TX', '75075'],
            ['Robert Marker', 'robert@hotmail.com', '469-555-3808','469-555-4629', '213 Nathanael Valley', 'Dayton', 'OH', '93017'],
            ['Polly Ester', 'polly@hotmail.com', '310-555-3912','972-776-8423', '2380 Uriel Rapid', 'Los Angeles', 'CA', '92128'],
            ['Mark Moe', 'mark@hotmail.com', '857-493-9718','734-936-9141', '1660 Helene Rapids', 'New Dameon', 'TN', '92128']
        ];
        $count = count($contacts);

        //todo: use generic test/guest account
        $user_id = User::where('name', '=', 'Ala Mushal')->pluck('id')->first(); //temp

        # Find that author in the authors table
        //$name = $contacts[0];
        $group_id = Group::where('name', '=', 'Family')->pluck('id')->first();

        foreach ($contacts as $contactData) {

            $contact = new Contact();
            $contact->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $contact->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $contact->user_id = $user_id;
            $contact->group_id = $group_id;
            $contact->name = $contactData[0];
            $contact->email = $contactData[1];
            $contact->home_phone = $contactData[2];
            $contact->mobile_phone = $contactData[3];
            $contact->address = $contactData[4];
            $contact->city = $contactData[5];
            $contact->state = $contactData[6];
            $contact->zip = $contactData[7];
            $contact->save();
            $count--;
        }

    }
}
