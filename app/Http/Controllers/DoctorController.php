<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\doctor;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    // Login chack
    public function __construct(){
        $this->middleware('auth');
    }

    public function AllDoctor(){
        $doctors = doctor::latest()->get();
        return view('admin.doctor.index',compact('doctors'));
    }
    public function storeDoctor(){
        return view('admin.doctor.add');
    }

    // Add Doctor
    public function AddDoctor(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'specialist' => 'required',
            'district' => 'required',
            'chamber' => 'required',
            'photo' => 'required|mimes:jpg,png,jpeg,webp|max:1024',
        ]);

        $photo = $request->file('photo');
        $name_genarate = hexdec(uniqid());
        $img_ext = strtolower($photo->getClientOriginalExtension());
        $img_name = $name_genarate.'.'.$img_ext;
        $up_location = 'image/doctor/';
        $last_img = $up_location.$img_name;
        $photo->move($up_location,$img_name);
        doctor::insert([
            'name' => $request->name,
            'specialist' => $request->specialist,
            'district' => $request->district,
            'chamber' => $request->chamber,
            'photo' => $last_img,
            'view' => $request->view,
            'slug' => Str::slug($request->name, '-'),
            'created_at' => Carbon::now()
        ]);
        return Redirect()->route('all.doctor')->with('success','Doctor Add Successfully');
    }
    // Edit 
    public function Edit($id){
        $doctor = doctor::find($id);
        return view('admin.doctor.edit',compact('doctor'));
    }
    // Update
    public function Update(Request $request, $id){
        $validated = $request->validate([
            'name' => 'required',
            'specialist' => 'required',
            'district' => 'required',
            'chamber' => 'required',
        ]);
        $photo = $request->file('photo');
        if($photo){
        $old_image = $request->old_image;
        if(!$old_image == ""){
        unlink($old_image);
        $name_genarate = hexdec(uniqid());
        $img_ext = strtolower($photo->getClientOriginalExtension());
        $img_name = $name_genarate.'.'.$img_ext;
        $up_location = 'image/doctor/';
        $last_img = $up_location.$img_name;
        $photo->move($up_location,$img_name);
        $exist=DB::table('doctors')->where('id',$id)->first();
   
        if(is_null($exist->slug)){
             $slug = Str::slug($request->name, '-'); 
          
        }else{
            $slug=$exist->slug;
        }
        $update = doctor::find($id)->update([
            'name' => $request->name,
            'specialist' => $request->specialist,
            'district' => $request->district,
            'chamber' => $request->chamber,
            'photo' => $last_img,
            'slug' => $slug
        ]);
        }
        elseif($old_image == ""){
            $exist=DB::table('doctors')->where('id',$id)->first();
                if(is_null($exist->slug)){
                 $slug = Str::slug($request->name, '-'); 
                }
                else{
                    $slug=$exist->slug;
                }
            $name_genarate = hexdec(uniqid());
            $img_ext = strtolower($photo->getClientOriginalExtension());
            $img_name = $name_genarate.'.'.$img_ext;
            $up_location = 'image/doctor/';
            $last_img = $up_location.$img_name;
            $photo->move($up_location,$img_name);
    
            $update = doctor::find($id)->update([
                'name' => $request->name,
                'specialist' => $request->specialist,
                'district' => $request->district,
                'chamber' => $request->chamber,
                'photo' => $last_img,
                'slug' => $slug,
            ]);
        }

            return Redirect()->route('all.doctor')->with('success','Update Doctor Successfully');
        }
        else{
            $exist=DB::table('doctors')->where('id',$id)->first();
   
                  if(is_null($exist->slug)){
                  $slug = Str::slug($request->name, '-'); 
                  }else{
                    $slug=$exist->slug;
                  }
            $update = doctor::find($id)->update([
                'name' => $request->name,
                'specialist' => $request->specialist,
                'district' => $request->district,
                'chamber' => $request->chamber,
                'slug' => $slug,
            ]);
            return Redirect()->route('all.doctor')->with('success','Update Doctor Successfully');
        }    
    }
    
    // Delete
    public function Delete($id){
    $photo = doctor::find($id);
    $old_image = $photo->photo;
    unlink($old_image);
    doctor::find($id)->delete();
    return Redirect()->back()->with('success','Doctor Delete Successfully');
    }
}
