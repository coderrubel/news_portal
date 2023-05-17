<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeaderAds1;
use App\Models\SidebarAds;
use App\Models\Brand;
use App\Models\Post;
use App\Models\doctor;
use App\Models\Category;
use App\Models\SubCatagory;
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
                $categories  = Category::where('show_on_menu','Show')->orderBy('catagory_order','asc')->get();
                $subcatagory = SubCatagory::get();
                return view('pages.home',compact('setting','brands','header1','sidebar','post','new_post_details','categories','subcatagory'));
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

        // Doctor page
        public function doctorPage(Request $request){
            $districts = doctor::groupBy('district')->get();
            $specialists = doctor::groupBy('specialist')->get();
            $doctors = doctor::latest('visitors', 'desc')->paginate(30);
            return view('pages.doctor',compact('doctors','specialists','districts'));
        }
        
        // Doctor Search by District
        public function doctorSearch(Request $request){
            $district = $request->district;
            $specialist = $request->specialist;
            if($district == 'all' && $specialist != 'all'){
                $doctors = Doctor::where('specialist',$specialist)->paginate(30);
            }else if($district != 'all' && $specialist == 'all') {
                $doctors = Doctor::where('district',$district)->paginate(30);
            }
            else if($district != 'all' && $specialist != 'all') {
                $doctors = Doctor::where('district',$district)->where('specialist',$specialist)->paginate(30);
            }else {
                $doctors = Doctor::paginate(30);
            }
            return view('pages.newDoctor',compact('doctors'));
        }

        // Doctor Search by Specialist
        public function specialistdoctorSearch(Request $request){
            $district = $request->district;
            $specialist = $request->specialist;
            if($district == 'all' && $specialist != 'all'){
                $doctors = Doctor::where('specialist',$specialist)->paginate(30);
            }else if($district != 'all' && $specialist == 'all') {
                $doctors = Doctor::where('district',$district)->paginate(30);
            }
            else if($district != 'all' && $specialist != 'all') {
                $doctors = Doctor::where('district',$district)->where('specialist',$specialist)->paginate(30);
            }else {
                $doctors = Doctor::paginate(30);
            }
            return view('pages.newDoctor',compact('doctors'));
        }
        
        // Docotr View    
        public function doctorView($id){
            $doctorview = doctor::where('id',$id)->first();
            $new_value = $doctorview->visitors+1;
            $doctorview->visitors = $new_value;
            $doctorview->update();
            return view('pages.doctor_view',compact('doctorview'));
        }

        // Category Page
        public function Category($id){
            try {
            $category = Category::where('id', $id,)->where('show_on_menu','Show')->first();
            return view('pages.category',compact('category'));
        } catch (\Throwable $e) {
            abort(401);
        }
        }
}
