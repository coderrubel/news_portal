<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\doctor;
use App\Models\specialist;
use App\Models\Division;
use App\Models\District;
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

    // sotre
    public function storeDoctor(){
        $divisions = Division::latest()->get();
        $districts = District::latest()->get();
        $specs = specialist::latest()->get();
        return view('admin.doctor.add',compact('divisions','districts','specs'));
    }

    // Add Doctor
    public function AddDoctor(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'division' => 'required',
            'specialist' => 'required',
            'district' => 'required',
            'hospital' => 'required',
            'designation' => 'required',
            'degree' => 'required',
            'chamber' => 'required',
            'mobile1' => 'required',
            'gender' => 'required',
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
            'division' => $request->division,
            'district' => $request->district,
            'specialist' => $request->specialist,
            'bmdc' => $request->bmdc,
            'gender' => $request->gender,
            'hospital' => $request->hospital,
            'designation' => $request->designation,
            'degree' => $request->degree,
            'chamber' => $request->chamber,
            'description' => $request->description,
            'mobile1' => $request->mobile1,
            'mobile2' => $request->mobile2,
            'email' => $request->email,
            'photo' => $last_img,
            'view' => $request->view,
            'status' => $request->status,
            'slug' => Str::slug($request->name, '-'),
            'created_at' => Carbon::now()
        ]);
        return Redirect()->route('all.doctor')->with('success','Doctor Add Successfully');
    }

    // District store
    public function getDistri(Request $request){
        $divis = $request->divis;
        $doctors = District::where('division_id',$divis)->get();
        foreach($doctors as $doctor){
            echo "<option  value='" . $doctor->id . "'>" . $doctor->district . "</option>";
        }
    }

    // Edit 
    public function Edit($id){
        $doctor = doctor::find($id);
        $divisions = Division::latest()->get();
        $districts = District::latest()->get();
        $specs = specialist::latest()->get();
        return view('admin.doctor.edit',compact('doctor','divisions','districts','specs'));
    }
    // Update
    public function Update(Request $request, $id){
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
            'division' => $request->division,
            'gender' => $request->gender,
            'bmdc' => $request->bmdc,    
            'hospital' => $request->hospital,
            'designation' => $request->designation,
            'degree' => $request->degree,
            'chamber' => $request->chamber,
            'description' => $request->description,
            'mobile1' => $request->mobile1,
            'mobile2' => $request->mobile2,
            'email' => $request->email,
            'status' => $request->status,
            'photo' => $last_img,
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
                'division' => $request->division,
                'gender' => $request->gender,
                'bmdc' => $request->bmdc,    
                'hospital' => $request->hospital,
                'designation' => $request->designation,
                'degree' => $request->degree,
                'chamber' => $request->chamber,
                'description' => $request->description,
                'mobile1' => $request->mobile1,
                'mobile2' => $request->mobile2,
                'email' => $request->email,
                'status' => $request->status,
                'photo' => $last_img,
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
                'division' => $request->division,
                'gender' => $request->gender,
                'bmdc' => $request->bmdc,    
                'hospital' => $request->hospital,
                'designation' => $request->designation,
                'degree' => $request->degree,
                'chamber' => $request->chamber,
                'description' => $request->description,
                'mobile1' => $request->mobile1,
                'mobile2' => $request->mobile2,
                'status' => $request->status,
                'email' => $request->email,
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

    public function dstatusChange(Request $request) {
     $id = $request->id;
     $status_value = $request->value;
     if ( $status_value  == '0'){
        doctor::find($id)->update([        
            'status' => 'active',
        ]);
     }else if($status_value  == '1') {
        doctor::find($id)->update([        
            'status' => 'inactive',
        ]);
     }
   $post =  doctor::find($id);
   if($post->status == 'active'){
    echo '<span class="btn btn-sm btn-success" onclick="dstatusChange('.$post->id.',1)">Active</span>';
   }
   else if($post->status == 'inactive') {
    echo '<span class="btn btn-sm btn-danger" onclick="dstatusChange('.$post->id.',0)">Inactive</span>';
    }
    }
}
