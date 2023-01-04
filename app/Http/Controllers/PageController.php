<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Post;
use App\Models\Brand;
use App\Models\SubCatagory;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
        // Home page
        public function homePage(){
        $setting = DB::table('settings')->first();
        $brands = Brand::latest()->first();
        $post = Post::latest()->get();
        $new_post_details = Post::latest('id', 'desc')->get();
        $subcagagorys = SubCatagory::with('rCaregory')->latest()->get();
        // $sub_catagory_data = SubCatagory::with('rPost')->orderBy('sub_catagory_order','asc')->where('show_on_home','Show')->get();
        // $sub_catagory_data = SubCatagory::with('rCaregory')->orderBy('sub_catagory_order','asc')->where('show_on_home','Show')->get();
        $catagory = Category::with('rrPost','rrCaregory')->where('show_on_menu','Show')->get();

        return view('pages.home',compact('setting','brands','post','new_post_details','subcagagorys','catagory'));
        }

        // Post Details
        public function PostDetails($id){
            $post_details = Post::where('id', $id)->first();

            // Visitor 
            $new_value = $post_details->visitors+1;
            $post_details->visitors = $new_value;
            $post_details->update();
            
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
