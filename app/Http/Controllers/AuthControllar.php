<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthControllar extends Controller
{
    // Logout
    public function Logout(){
        Auth::logout();
        return Redirect()->route('login')->with('success','User Logout');
    }
}
