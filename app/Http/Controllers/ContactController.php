<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Group;
use App\Tag;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();

        if ($user) {
            $contacts = $user->contacts()->paginate(50);
        } else {
            $contacts = [];
        }


        //$contacts = Contact::paginate(50);

        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create')->with([
            'groupsForDropdown' => Group::getForDropdown(),
            'tagsForCheckboxes' => Tag::getForCheckboxes(),
            'contact' => new Contact(),
            'tags' => [],
        ]);
        //return view('contacts.add');
    }

    public function edit($id)
    {
        # Get this contact and eager load its tags
        $contact = Contact::with('tags')->find($id);

        # Handle the case where we can't find the given contact
        if (!$contact) {
            flash($contact->name.' not found.', 'error');
            return redirect('/contacts');
        }

        //return view('contacts.edit', compact('contact'));

        return view('contacts.edit')->with([
            'groupsForDropdown' => Group::getForDropdown(),
            'tagsForCheckboxes' => Tag::getForCheckboxes(),
            'tags' => $contact->tags()->pluck('tags.id')->toArray(),
            'contact' => $contact
        ]);
    }

    public function store(Request $request)
    {
        # Custom validation messages
        $messages = [
            'group_id.required' => 'The group field is required.',
        ];
        $this->validate($request, [
            'name' => 'required',
            'home_phone' => 'required|digits:10',
            'mobile_phone' => 'required|digits:10',
            'group_id' => 'required'
        ], $messages);

        //$contact = Contact::create($request->all());
        $user = $request->user();

        # Save the contact to the database
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->group_id = $request->group_id;
        $contact->user_id = $user->id;
        $contact->mobile_phone = $request->mobile_phone;
        $contact->home_phone = $request->home_phone;
        $contact->description = $request->description;
        $contact->address = $request->address;
        $contact->city = $request->city;
        $contact->state = $request->state;
        $contact->zip = $request->zip;

        $contact->save();

        $contact->tags()->sync($request->input('tags'));


        flash($contact->name.' is saved.', 'success');

        return redirect()->route('contacts.index');
    }

    public function update(Request $request, $id)
    {
//        $contact_id->update($request->all());
//
//        flash($contact_id->name.' is updated.', 'success');
//
//        return redirect()->route('contacts.index');

        # Custom validation messages
        $messages = [
            'group_id.required' => 'The group field is required.',
        ];
        $this->validate($request, [
            'name' => 'required',
            'home_phone' => 'required',
            'mobile_phone' => 'required',
            'group_id' => 'required'
        ], $messages);

        # Fetch the contact we want to update
        $contact = Contact::find($id);
        # Update data
        $contact->name = $request->name;
        $contact->group_id = $request->group_id;
        $contact->mobile_phone = $request->mobile_phone;
        $contact->home_phone = $request->home_phone;
        $contact->description = $request->description;
        $contact->address = $request->address;
        $contact->city = $request->city;
        $contact->state = $request->state;
        $contact->zip = $request->zip;
        $contact->tags()->sync($request->input('tags'));
        # Save edits
        $contact->update();
//        $contact_id->update($contact);

        flash($contact->name.' is updated.', 'success');
        # Send the user back to the edit page in case they want to make more edits
        return redirect()->route('contacts.index');
    }

    public function destroy($id)
    {

        $contact = Contact::find($id);
        # Before we delete the contact we have to delete any tag associations
        $contact->tags()->detach();

        $contact->delete();
        flash($contact->name . ' is deleted.', 'success');

        return redirect()->route('contacts.index');
    }

    public function search(Request $request){

        $contacts = Contact::where('name', 'LIKE', '%'.$request->get('search').'%')
            ->orWhere('description', 'LIKE', '%'.$request->get('search').'%')
            ->paginate(50);

        return view('contacts.index', compact('contacts'));
    }

}
