<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
    public function index() {
        $myContacts = Contact::first();
        return response()->json($myContacts);
    }

    public function update(Request $request, $id) {
        $myContact = Contact::findOrFail($id);
        $myContact->update($request->all());

        //$message = "contacts updated sussessfully";

        return response()->json(200);
    }
}
