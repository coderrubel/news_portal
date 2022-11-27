<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
        // Home page
         public function homePage(){
         $setting = DB::table('settings')->first();
            return view('pages.home',compact('setting'));
         }

        // FAQ page
        public function faqPage(){
            return view('pages.faq');
        }
    
        // About page
        public function aboutPage(){
        $abouts = DB::table('abouts')->first();
        return view('pages.about',compact('abouts'));
        }
}
