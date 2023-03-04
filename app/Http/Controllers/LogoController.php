<?php

namespace App\Http\Controllers;

use App\Models\logo;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    // Login chack
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function AllLogo(){
        $logos = logo::latest()->paginate(5);
        return view('admin.logo.index',compact('logos'));
    }
    
    public function StoreLogo(Request $request){
        $validateDate = $request->validate([
            'name' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
        ],
        [
            'name.required' => 'Please Input Logo Name',
        ]);
    
        $image = $request->file('image');
    
        $name_genarate = hexdec(uniqid());
        $img_ext = strtolower($image->getClientOriginalExtension());
        $name = $name_genarate.'.'.$img_ext;
        $up_location = 'image/logo/';
        $last_img = $up_location.$name;
        $image->move($up_location,$name);
    
        logo::insert([
            'name' => $request->name,
            'image' => $last_img,
            'created_at' => Carbon::now()
        ]);
    
        return Redirect()->back()->with('success','Logo Add Successfully');
    }
    
    // Edit
    public function Edit($id){
        $logos = logo::find($id);
        return view('admin.logo.edit',compact('logos')); 
    }
    
    // Update
    public function Update(Request $request, $id){
        $validateDate = $request->validate([
            'name' => 'required',
        ],
        [
            'name.required' => 'Please Input Logo Name',
        ]);
        
        $old_image = $request->old_image;
        $image = $request->file('image');
        if($image){
            $name_genarate = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());
            $img_name = $name_genarate.'.'.$img_ext;
            $up_location = 'image/logo/';
            $last_img = $up_location.$img_name;
            $image->move($up_location,$img_name);
    
            unlink($old_image);
            logo::find($id)->update([
                'name' => $request->name,
                'image' => $last_img,
                'created_at' => Carbon::now()
            ]);
    
            return Redirect()->route('all.logo')->with('success','Logo Updated Successfully');
        } 
        else{
            logo::find($id)->update([
                'name' => $request->name,
                'created_at' => Carbon::now()
            ]);
    
            return Redirect()->route('all.logo')->with('success','Logo Update Successfully');
        }
        
    }
    
    // Delete
    public function Delete($id){
        $image = logo::find($id);
        $old_image = $image->image;
        unlink($old_image);
        logo::find($id)->delete();
        return Redirect()->back()->with('success','Logo Delete Successfully');
    }
    }