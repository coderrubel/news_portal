<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Brand;

class BrandController extends Controller
{
    // Login chack
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function AllBrand(){
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.allbrand',compact('brands'));
    }

    public function StoreBrand(Request $request){
        $validateDate = $request->validate([
            'brand_name' => 'required|unique:brands|max:15|min:4',
            'brand_image' => 'required|mimes:jpg,jpeg,png',
        ],
        [
            'brand_name.required' => 'Please Input Brand Name',
            'brand_image.min' => 'Brand Longer Then 4 Characters',
        ]);

        $brand_image = $request->file('brand_image');

        $name_genarate = hexdec(uniqid());
        $img_ext = strtolower($brand_image->getClientOriginalExtension());
        $img_name = $name_genarate.'.'.$img_ext;
        $up_location = 'image/brand/';
        $last_img = $up_location.$img_name;
        $brand_image->move($up_location,$img_name);

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->back()->with('success','Brand Inserted Successfully');
    }

    // Edit
    public function Edit($id){
        $brands = Brand::find($id);
        return view('admin.brand.edit',compact('brands')); 
    }

    // Update
    public function Update(Request $request, $id){
        $validateDate = $request->validate([
            'brand_name' => 'required|min:4',
        ],
        [
            'brand_name.required' => 'Please Input Brand Name',
            'brand_image.min' => 'Brand Longer Then 4 Characters',
        ]);
        
        $old_image = $request->old_image;
        $brand_image = $request->file('brand_image');
        if($brand_image){
            $name_genarate = hexdec(uniqid());
            $img_ext = strtolower($brand_image->getClientOriginalExtension());
            $img_name = $name_genarate.'.'.$img_ext;
            $up_location = 'image/brand/';
            $last_img = $up_location.$img_name;
            $brand_image->move($up_location,$img_name);
    
            unlink($old_image);
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'brand_image' => $last_img,
                'created_at' => Carbon::now()
            ]);
    
            return Redirect()->back()->with('success','Brand Updated Successfully');
        } 
        else{
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'created_at' => Carbon::now()
            ]);

            return Redirect()->route('all.brand')->with('success','Brand Update Successfully');
        }
        
    }

    // Delete
    public function Delete($id){
        $image = Brand::find($id);
        $old_image = $image->brand_image;
        unlink($old_image);
        Brand::find($id)->delete();
        return Redirect()->back()->with('success','Brand Delete Successfully');
    }
}
