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
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        #$tags = Tag::getForCheckboxes();
        #return view('contacts.index', compact('contacts', 'tags'));

        $user = $request->user();
        $contacts = $user->contacts()->orderBy('name')->get();

        return view('contacts.index')->with([
            'contacts' => $contacts
        ]);
    }

    public function create()
    {
        return view('contacts.create')->with([
            'groupsForDropdown' => Group::getForDropdown(),
            'tagsForCheckboxes' => Tag::getForCheckboxes(),
            'contact' => new Contact(),
            'tags' => [],
        ]);
    }

    public function edit($id)
    {
        # Get this contact and eager load its tags
        $contact = Contact::with('tags')->find($id);

        # Handle the case where we can't find the given contact
        if (!$contact) {
            flash($contact->name . ' not found.', 'error');

            return redirect('/contacts');
        }

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
            #'group_id.required' => 'The group field is required.',
            'required' => 'Required',
        ];

        $this->validate($request, [
            'name' => 'required|alpha_spaces|max:50',
            'email' => 'required|email',
            'mobile_phone' => 'required|phone:US',
            'home_phone' => 'nullable|phone:US',
            'address' => 'nullable|string|max:191',
            'city' => 'nullable|alpha_spaces|max:50',
            'state' => 'nullable|alpha_spaces|max:50',
            'zip' => 'nullable|digits:5',
            'group_id' => 'required'
        ], $messages);

        $user = $request->user();

        //Will manually associate group with Tag to save trip to database
        #$group = Group::find($request->input('group'));

        # Save the contact to the database
        $contact = new Contact();
        $contact->name = $request->name;
        #$contact->group()->associate($group); # <--- Associate the group with this contact
        $contact->group_id = $request->group_id;
        $contact->user_id = $user->id;
        $contact->mobile_phone = $request->mobile_phone;
        $contact->home_phone = $request->home_phone;
        $contact->email = $request->email;
        $contact->address = $request->address;
        $contact->city = $request->city;
        $contact->state = $request->state;
        $contact->zip = $request->zip;

        $contact->save();

        $contact->tags()->sync($request->input('tags'));

        flash($contact->name . ' is saved.', 'success');

        return redirect()->route('contacts.index');
    }

    public function update(Request $request, $id)
    {
        # Custom validation messages
        $messages = [
            'required' => 'Required',
        ];

        $this->validate($request, [
            'name' => 'required|alpha_spaces|max:50',
            'email' => 'required|email',
            'mobile_phone' => 'required|phone:US',
            'home_phone' => 'nullable|phone:US',
            'address' => 'nullable|string|max:191',
            'city' => 'nullable|alpha_spaces|max:50',
            'state' => 'nullable|alpha_spaces|max:50',
            'zip' => 'nullable|digits:5',
            'group_id' => 'required'
        ], $messages);

        # Fetch the contact we want to update
        $contact = Contact::find($id);
        # Update data
        $contact->name = $request->name;
        $contact->group_id = $request->group_id;
        $contact->mobile_phone = $request->mobile_phone;
        $contact->home_phone = $request->home_phone;
        $contact->email = $request->email;
        $contact->address = $request->address;
        $contact->city = $request->city;
        $contact->state = $request->state;
        $contact->zip = $request->zip;
        $contact->tags()->sync($request->input('tags'));
        # Save edits
        $contact->update();

        flash($contact->name . ' is updated.', 'success');

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

    public function search(Request $request)
    {
        $user = \Auth::user(); //$request->user();

        $search = $request->get('search');
        $contacts = $user->contacts()->where(function ($query) use ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%')
                ->orWhere('mobile_phone', 'LIKE', '%' . $search . '%')
                ->orWhere('home_phone', 'LIKE', '%' . $search . '%')
                ->orWhere('address', 'LIKE', '%' . $search . '%')
                ->orWhere('city', 'LIKE', '%' . $search . '%')
                ->orWhere('state', 'LIKE', '%' . $search . '%')
                ->orWhere('zip', 'LIKE', '%' . $search . '%');
        })->paginate(5);

        //dd($contacts);
        return view('contacts.index', compact('contacts'));
    }
}
