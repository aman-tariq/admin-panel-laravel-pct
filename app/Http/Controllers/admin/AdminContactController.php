<?php
namespace App\Http\Controllers\admin;

use App\Models\Contact;
use Illuminate\Http\Request;

class AdminContactController extends AdminBaseController
{
    public function index(Request $request)
    {
        $redirect = $this->checkAdminLogin($request);
        if ($redirect) {
            return $redirect;
        }
        $contacts = Contact::all();
        return view('admin.contacts.index', compact('contacts'));
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
        $contact = Contact::findOrFail($id);
        $contact->update($request->all());
        return redirect()->route('admin.contacts.index')->with('success', 'Contact lead updated successfully!');
    }

    public function destroy(Request $request, $id)
    {
        $redirect = $this->checkAdminLogin($request);
        if ($redirect) {
            return $redirect;
        }
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Contact deleted successfully!');
    }
}