<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Post;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
        // Home page
        public function homePage(){
        $setting = DB::table('settings')->first();
        $brands = Brand::latest()->first();
        $post = Post::latest()->get();
             return view('pages.home',compact('setting','brands','post'));
        }

        // Post Details
        public function PostDetails($id){
            $post_details = Post::where('id', $id)->first();
            return view('pages.post_details',compact('post_details'));
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
