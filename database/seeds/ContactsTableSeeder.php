<?php

use Illuminate\Database\Seeder;
use App\Contact;

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
            ['Tony Sabeih', '858-222-3912','858-610-1053', '12900 Meadow Glen', 'Poway', 'CA', '92064','Friend'],
            ['Ali Mashal', '858-222-3912','313-734-3526', '12361 Twin Peaks Lake Dr', 'Ann Arbor', 'MI', '48084','Family'],
            ['Alaa Khalil', '858-222-3912','858-231-4629', '12190 Rolling Meadows Ct', 'San Diego', 'CA', '92128','Spouse'],
        ];
        $count = count($contacts);
        foreach ($contacts as $contactData) {

            $contact = new Contact();
            $contact->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $contact->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $contact->name = $contactData[0];
            $contact->home_phone = $contactData[1]; # Remove the old way we stored the author
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
