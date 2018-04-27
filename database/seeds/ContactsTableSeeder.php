<?php

use Illuminate\Database\Seeder;
use App\Contact;
use App\User;

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
            ['Ala Mushal', '858-222-3912','858-231-3526', '12190 Rolling Meadows Ct', 'San Diego', 'CA', '92128','Me'],
            ['Tony Balogne', '858-555-3912','858-555-1053', '12900 Meadow Glen', 'Poway', 'CA', '92064','Friend'],
            ['John Doe', '313-555-3912','313-555-3526', '12361 Twin Peaks Lake Dr', 'Ann Arbor', 'MI', '48084','Family'],
            ['Jane Doe', '734-555-3912','734-555-4629', '12190 Rolling Meadows Ct', 'San Diego', 'CA', '92128','Spouse'],
        ];
        $count = count($contacts);

        //todo: use generic test/guest account
        $user_id = User::where('name', '=', 'Ala Mushal')->pluck('id')->first(); //temp

        foreach ($contacts as $contactData) {

            $contact = new Contact();
            $contact->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $contact->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $contact->user_id = $user_id;
            $contact->name = $contactData[0];
            $contact->home_phone = $contactData[1];
            $contact->mobile_phone = $contactData[2];
            $contact->address = $contactData[3];
            $contact->city = $contactData[4];
            $contact->state = $contactData[5];
            $contact->zip = $contactData[6];
            $contact->description = $contactData[7];
            $contact->save();
            $count--;
        }

    }
}
