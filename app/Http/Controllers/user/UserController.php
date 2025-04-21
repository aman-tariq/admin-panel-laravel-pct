<?php
namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Menu;
use App\Models\Career;

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

    // Get dynamic user menu
    public function getUserMenu()
    {
        return Menu::where('type', 'user')->orderBy('order', 'asc')->get();
    }

    // Show Careers page
    public function careers()
    {
        return view('user.careers');
    }

    // Show About page
    public function about()
    {
        return view('user.about');
    }

    // Show Services page
    public function services()
    {
        return view('user.services');
    }

    // Handle Careers form submission
    public function storeCareer(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'experience' => 'required|string|max:255',
            'skills' => 'required|string|max:255',
            'message' => 'nullable|string',
        ]);

        Career::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'experience' => $request->experience,
            'skills' => $request->skills,
            'message' => $request->message,
        ]);

        return redirect('/careers')->with('success', 'Application submitted successfully!');
    }
}