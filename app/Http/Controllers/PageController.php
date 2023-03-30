<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeaderAds;
use App\Models\HeaderAds1;
use App\Models\SidebarAds;
use App\Models\Brand;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Throwable;

class PageController extends Controller
{
        // Home page
        public function homePage(){
            try{
                $setting = DB::table('settings')->first();
                $header1 = HeaderAds1::latest()->first();
                $sidebar = SidebarAds::latest()->first();
                $brands = Brand::latest()->first();
                $post = Post::latest()->where('status','active')->get();
                $new_post_details = Post::latest('id', 'desc')->where('status','active')->get();
                $categories  = Category::where('show_on_menu','Show')->get();
                return view('pages.home',compact('setting','brands','header1','sidebar','post','new_post_details','categories'));
            }catch (Throwable $e) {
                abort(404);
            }
        }

        // Post Details
        public function PostDetails($id){
            try {
                $post_details = Post::where('id', $id)->where('status','active')->first();
                $relatedPost = Post::latest('visitors', 'desc')->get();
                $category = Category::get();
                // Visitor 
                $new_value = $post_details->visitors+1;
                $post_details->visitors = $new_value;
                $post_details->update();
                return view('pages.post_details',compact('post_details','relatedPost','category'));
            } catch (Throwable $e) {
                abort(404);
            }
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
            try {
            $categorysPost = Category::with(['posts'])->where('id', $id)->first();
            return view('pages.category',compact('category','categorysPost'));
        } catch (\Throwable $e) {
            abort(401);
        }
        }
}
