<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\AdminAccountContacts;
use Illuminate\Http\Request;

class AdminContactController extends AdminBaseController
{
    public function index(Request $request)
    {
        $redirect = $this->checkAdminLogin($request);
        if ($redirect) {
            return $redirect;
        }

        // Get all contacts from the database
        $contacts = AdminAccountContacts::all();

        return view('admin.contacts.index', compact('contacts'));  // Use the correct variable name here
    }

    public function update(Request $request, $id)
    {
        $redirect = $this->checkAdminLogin($request);
        if ($redirect) {
            return $redirect;
        }

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'message' => 'nullable|string',
        ]);

        // Find the contact by ID and update it
        $contact = AdminAccountContacts::findOrFail($id);
        $contact->update($request->all());

        return redirect()->route('admin.contacts.index')->with('success', 'Contact lead updated successfully!');
    }

    public function destroy(Request $request, $id)
    {
        $redirect = $this->checkAdminLogin($request);
        if ($redirect) {
            return $redirect;
        }

        // Find the contact by ID and delete it
        $contact = AdminAccountContacts::findOrFail($id);
        $contact->delete();

        return redirect()->route('admin.contacts.index')->with('success', 'Contact deleted successfully!');
    }
}
