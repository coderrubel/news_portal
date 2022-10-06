<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Contact;
use App\Models\ContactForm;

class ContactController extends Controller
{

    // Home Contact Page
    public function Contact(){
        $contacts = Contact::first();
        return view('pages/contact',compact('contacts'));
    }

    // Contact Form
    public function ContactForm(Request $request){
        $validateDate = $request->validate([
            'name' => 'required|max:25|min:4',
            'email' => 'required|max:35|min:8',
            'subject' => 'required|max:45|min:4',
            'message' => 'required|max:415|min:4',
        ]);
        ContactForm::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
        return Redirect()->route('contact')->with('success','Your message has been sent. Thank you!');
    }

}
