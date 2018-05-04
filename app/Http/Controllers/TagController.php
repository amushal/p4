<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Tag;

class TagController extends Controller
{
    public function index(Request $request, Tag $tag)
    {


        $user = $request->user();

        if ($user) {
            if (empty($tag->toArray())) {
                $contacts = $user->contacts()->orderBy('name')->paginate(5);
            } else {
                $contacts = $tag->contacts()->orderBy('name')->paginate(5);
            }

        } else {
            return $tag;

            $contacts = [];
        }

        return view('contacts.index', compact('contacts'));

    }
}
