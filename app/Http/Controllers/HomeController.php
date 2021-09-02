<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class HomeController extends Controller
{
    public function HomeSlider(){
        $sliders = Slider::latest()->get();
        return view('admin.slider.index', compact('sliders'));
    }

    // Add Slider
    public function AddSlider(){
        return view('admin.slider.create');
    }

    // Store Slider
    public function StoreSlider(Request $request){

        

        $slider_image = $request->file('image');

        $name_genarate = hexdec(uniqid());
        $img_ext = strtolower($slider_image->getClientOriginalExtension());
        $img_name = $name_genarate.'.'.$img_ext;
        $up_location = 'image/slider/';
        $last_img = $up_location.$img_name;
        $slider_image->move($up_location,$img_name);

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $last_img,
        ]);

        return Redirect()->route('home.slider')->with('success','Slider Created Successfully');
    }

    // Edit
    public function Edit($id){
        $sliders = Slider::find($id);
        return view('admin.slider.edit',compact('sliders')); 
    }

    // Update
    public function Update(Request $request, $id){
        $validateDate = $request->validate([
            'title' => 'required|min:4',
            'description' => 'required|min:5',
        ],
        [
            'title.required' => 'Title must be 4 characters',
            'description.required' => 'Description must be 5 characters',
            'image.min' => 'Brand Longer Then 4 Characters',
        ]);
        
        $old_image = $request->old_image;
        $slider_image = $request->file('image');
        if($slider_image){
            $name_genarate = hexdec(uniqid());
            $img_ext = strtolower($slider_image->getClientOriginalExtension());
            $img_name = $name_genarate.'.'.$img_ext;
            $up_location = 'image/slider/';
            $last_img = $up_location.$img_name;
            $slider_image->move($up_location,$img_name);
    
        //    unlink($old_image);
            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $last_img,
            //    'created_at' => Carbon::now()
            ]);
    
            return Redirect()->back()->with('success','Slider Updated Successfully');
        } 
        else{
            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
              //  'slider_image' => $last_img,
            //    'created_at' => Carbon::now()
            ]);

            return Redirect()->route('home.slider')->with('success','Slider Update Successfully');
        }
        
    }

    // Slider Delete
    public function Delete($id){
        $image = Slider::find($id);
        $old_image = $image->image;
        unlink($old_image);
        Slider::find($id)->delete();
        return Redirect()->back()->with('success','Slider Delete Successfully');
    }
}
