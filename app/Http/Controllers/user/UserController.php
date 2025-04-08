<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class UserController extends Controller
{
    // Homepage
    public function index()
    {
        return view('user.home');
    }

    // Show Contact Us page
    public function contact()
    {
        return view('user.contact');
    }

    // Handle Contact Us form submission
    public function storeContact(Request $request)
    {
        Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'message' => $request->input('message'),
        ]);
        return redirect('/contact')->with('success', 'Message sent successfully!');
    }
}