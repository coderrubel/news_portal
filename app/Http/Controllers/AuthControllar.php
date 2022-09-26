<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Http\Mail\websitemail;

class AuthControllar extends Controller
{
    // Logout
    public function Logout(){
        Auth::logout();
        return Redirect()->route('login')->with('success','User Logout');
    }


}
