<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
        // Home page
         public function homePage(){
            return view('pages.home');
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
