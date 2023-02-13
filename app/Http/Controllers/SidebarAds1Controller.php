<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\SidebarAds1;

class SidebarAds1Controller extends Controller
{
    // Login chack
    public function __construct(){
     $this->middleware('auth');
 }
 
 public function show(){
     $ads = SidebarAds1::latest()->paginate(5);
     return view('admin.sidebarads2.index',compact('ads'));
 }
 
 public function Store(Request $request){
     $validateDate = $request->validate([
         'ads_name' => 'required',
         'ads_image' => 'required|mimes:jpg,jpeg,png,gif',
     ],
     [
         'ads_name.required' => 'Please Input Advertisement Name',
     ]);
 
     $ads_image = $request->file('ads_image');
 
     $name_genarate = hexdec(uniqid());
     $img_ext = strtolower($ads_image->getClientOriginalExtension());
     $img_name = $name_genarate.'.'.$img_ext;
     $up_location = 'image/brand/';
     $last_img = $up_location.$img_name;
     $ads_image->move($up_location,$img_name);
 
     SidebarAds1::insert([
         'ads_name' => $request->ads_name,
         'ads_url' => $request->ads_url,
         'ads_image' => $last_img,
         'created_at' => Carbon::now()
     ]);
 
     return Redirect()->back()->with('success','Advertisement Add Successfully');
 }
 
 // Edit
 public function Edit($id){
     $ads = SidebarAds1::find($id);
     return view('admin.sidebarads2.edit',compact('ads')); 
 }
 
 // Update
 public function Update(Request $request, $id){
     $validateDate = $request->validate([
         'ads_name' => 'required',
     ],
     [
         'ads_name.required' => 'Please Input Advertisement Name',
     ]);
     
     $old_image = $request->old_image;
     $ads_image = $request->file('ads_image');
     if($ads_image){
         $name_genarate = hexdec(uniqid());
         $img_ext = strtolower($ads_image->getClientOriginalExtension());
         $img_name = $name_genarate.'.'.$img_ext;
         $up_location = 'image/brand/';
         $last_img = $up_location.$img_name;
         $ads_image->move($up_location,$img_name);
 
         unlink($old_image);
         SidebarAds1::find($id)->update([
             'ads_name' => $request->ads_name,
             'ads_url' => $request->ads_url,
             'ads_image' => $last_img,
             'created_at' => Carbon::now()
         ]);
 
         return Redirect()->route('all.sidebar2')->with('success','Advertisement Updated Successfully');
     } 
     else{
        SidebarAds1::find($id)->update([
             'ads_name' => $request->ads_name,
             'ads_url' => $request->ads_url,
             'created_at' => Carbon::now()
         ]);
 
         return Redirect()->route('all.sidebar2')->with('success','Advertisement Update Successfully');
     }
     
 }
 
 // Delete
 public function Delete($id){
     $image = SidebarAds1::find($id);
     $old_image = $image->ads_image;
     unlink($old_image);
     SidebarAds1::find($id)->delete();
     return Redirect()->back()->with('success','Advertisement Delete Successfully');
 }
 }