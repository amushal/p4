<?php
use Illuminate\Database\Seeder;
use App\Contact;
use App\Tag;
class ContactTagTableSeeder extends Seeder
{
    public function run()
    {
        # First, create an array of all the contacts we want to associate tags with
        # The *key* will be the contact name, and the *value* will be an array of tags.
        $contacts = [
            'Ala Mushal' => ['Red'],
            'Jane Doe' => ['Green', 'Red'],
            'Richard Roe' => ['Yellow'],
            'John Smith' => ['Green']
        ];
        # Now loop through the above array, creating a new pivot for each contact to tag
        foreach ($contacts as $name => $tags) {
            # First get the book
            $contact = Contact::where('name', 'like', $name)->first();
            # Now loop through each tag for this book, adding the pivot
            foreach ($tags as $tagName) {
                $tag = Tag::where('name', 'LIKE', $tagName)->first();
                # Connect this tag to this book
                $contact->tags()->save($tag);
            }
        }
    }
}