<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeaderAds;
use App\Models\HeaderAds1;
use App\Models\SidebarAds;
use App\Models\SidebarAds1;
use App\Models\Brand;
use App\Models\Post;
use App\Models\SubCatagory;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
        // Home page
        public function homePage(){
        $setting = DB::table('settings')->first();
        $header = HeaderAds::latest()->first();
        $header1 = HeaderAds1::latest()->first();
        $sidebar = SidebarAds::latest()->first();
        $sidebar1 = SidebarAds1::latest()->first();
        $brands = Brand::latest()->first();
        $post = Post::latest()->get();
        $new_post_details = Post::latest('id', 'desc')->get();
        $popular_post = Post::latest('visitors', 'desc')->get();
        // $sub_catagory_data = SubCatagory::with('rCaregory')->orderBy('sub_catagory_order','asc')->where('show_on_home','Show')->get();
        $categories  = Category::where('show_on_menu','Show')->get();
        return view('pages.home',compact('setting','brands','header1','sidebar','sidebar1','post','new_post_details','popular_post','categories'));
        return view('components.header',compact('header'));
        }

        // Post Details
        public function PostDetails($id){
            $post_details = Post::where('id', $id)->first();
            $recent_post = Post::latest('id', 'desc')->get();
            $popular_post = Post::latest('visitors', 'desc')->get();
            $category = Category::get();
            // Visitor 
            $new_value = $post_details->visitors+1;
            $post_details->visitors = $new_value;
            $post_details->update();
            
            return view('pages.post_details',compact('post_details','recent_post','popular_post','category'));
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

        // Category Page
        public function Category($id){
            $category = Category::where('id', $id)->first();
            $recent_post = Post::latest('id', 'desc')->get();
            $popular_post = Post::latest('visitors', 'desc')->get();
            return view('pages.category',compact('category','recent_post','popular_post'));
        }
}
