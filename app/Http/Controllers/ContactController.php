<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

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
        $contacts = $user->contacts()->paginate(50);


        //$contacts = Contact::paginate(50);

        return view('contacts.index', compact('contacts'));
    }

    public function add()
    {
        return view('contacts.add');
    }

    public function edit(Contact $contact_id)
    {
        $contact = $contact_id;

        return view('contacts.edit', compact('contact'));
    }

    public function save(Request $request)
    {
        $contacts = Contact::create($request->all());

        flash($contacts->name.' is saved.', 'success');

        return redirect()->route('contacts.index');
    }

    public function update(Request $request, Contact $contact_id)
    {
        $contact_id->update($request->all());

        flash($contact_id->name.' is updated.', 'success');

        return redirect()->route('contacts.index');
    }

    public function destroy(Contact $contact_id)
    {
        $contact_id->delete();

        flash($contact_id->name.' is deleted.', 'success');

        return redirect()->route('contacts.index');
    }

    public function search(Request $request){

        $contacts = Contact::where('name', 'LIKE', '%'.$request->get('search').'%')
            ->orWhere('description', 'LIKE', '%'.$request->get('search').'%')
            ->paginate(50);

        return view('contacts.index', compact('contacts'));
    }

}
