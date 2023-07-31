<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeaderAds1;
use App\Models\SidebarAds;
use App\Models\Brand;
use App\Models\Post;
use App\Models\Division;
use App\Models\doctor;
use App\Models\Category;
use App\Models\District;
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

        // Post Details page
        public function PostDetails($slug){
            try {
                $post_details = Post::where('slug', $slug)->where('status','active')->first();
                $relatedPost = Post::latest('visitors', 'desc')->get();
                $category = Category::get();
                $new_value = $post_details->visitors+1;
                $post_details->visitors = $new_value;
                $post_details->update();
                return view('pages.post_details',compact('post_details','relatedPost','category'));
            } catch (Throwable $e) {
                abort(404);
            }
        }
        // Category Page
        public function Category($category_name){
            try {
            $category = Category::where('category_name', $category_name)->where('show_on_menu','Show')->first();
            return view('pages.category',compact('category'));
        } catch (\Throwable $e) {
            abort(401);
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
            $division = Division::get();
            $districts = District::groupBy('district')->get();
            $specialists = doctor::groupBy('specialist')->get();
            $doctors = doctor::latest('view', 'desc')->paginate(30);
            return view('pages.doctor',compact('division','doctors','specialists','districts'));
        }
        public function doctordSearch(Request $request){
            $division = $request->division;
            $district = $request->district;
            $specialist = $request->specialist;
            if($division != 'all' && $specialist == 'all'){
                $dis = District::where('division_id',$division)->first();
                $doctors = Doctor::where('district',$dis->id)->paginate(30);
            }
            else if($division != 'all' && $district != 'all' && $specialist != 'all') {
                $dis = District::where('division_id',$division)->first();
                $doctors = Doctor::where('division',$division)->where('district',$dis->id)->where('specialist',$specialist)->paginate(30);
            }
            else if($division == 'all'  && $specialist != 'all') {
                $doctors = Doctor::where('specialist',$specialist)->paginate(30);
            }
            
            else {
                $doctors = Doctor::paginate(30);
            }
            return view('pages.newDoctor',compact('doctors'));
        }
        
        // Doctor Search by district
        public function doctorSearch(Request $request){
            $division = $request->division;
            $district = $request->district;
            $specialist = $request->specialist;
            if($district != 'all' && $specialist == 'all'){
                $doctors = Doctor::where('division',$division)->where('district',$district)->paginate(30);
            }
            else if($division != 'all' && $district != 'all' && $specialist != 'all') {
                $doctors = Doctor::where('division',$division)->where('district',$district)->where('specialist',$specialist)->paginate(30);
            }
            else if($division == 'all' && $specialist != 'all') {
                $doctors = Doctor::where('specialist',$specialist)->paginate(30);
            }
            
            else {
                $doctors = Doctor::paginate(30);
            }
            return view('pages.newDoctor',compact('doctors'));
        }
        
        // Doctor Search by Specialist
        public function specialistdoctorSearch(Request $request){
            $division = $request->division;
            $district = $request->district;
            $specialist = $request->specialist;
            if($division == 'all' && $specialist != 'all'){
                $doctors = Doctor::where('specialist',$specialist)->paginate(30);
            }
            else if($division != 'all' && $district != 'all' && $specialist != 'all') {
                $doctors = Doctor::where('division',$division)->where('district',$district)->where('specialist',$specialist)->paginate(30);
            }
            else if($division != 'all' && $specialist == 'all') {
                $doctors = Doctor::where('division',$division)->where('district',$district)->paginate(30);
            }
            
            else {
                $doctors = Doctor::paginate(30);
            }
            return view('pages.newDoctor',compact('doctors'));
        }


        
        // district by division
        public function getDistrict(Request $request){
            $division = $request->division;
            $doctors = District::where('division_id',$division)->get();
            foreach($doctors as $doctor){
                echo "<option  value='" . $doctor->id . "'>" . $doctor->district . "</option>";
            }
        }
        // Docotr View    
        public function doctorView($slug){
            $doctorview = doctor::where('slug',$slug)->first();
            $new_value = $doctorview->view+1;
            $doctorview->view = $new_value;
            $doctorview->update();
            return view('pages.doctor_view',compact('doctorview'));
        }

}
