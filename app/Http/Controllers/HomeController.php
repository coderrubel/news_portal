<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Slider;
use App\Models\About;
use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
     // Login chack
     public function __construct(){
        $this->middleware('auth');
    }

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
        $validateDate = $request->validate([
            'title' => 'required|min:4',
            'description' => 'required|min:10',
            'image' => 'required',
        ],
        [
            'title.required' => 'Please Input FAQ Title',
            'title.min' => 'Title Longer Then 4 Characters',
            'description.required' => 'Please Input FAQ Description',
            'description.min' => 'Title Longer Then 10 Characters',
            'image.required' => 'Please Select Image',
        ]);
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

        return Redirect()->route('home.slider')->with('success','FAQ Created Successfully');
    }

    //  Edit Slider
    public function Edit($id){
        $sliders = Slider::find($id);
        return view('admin.slider.edit',compact('sliders')); 
    }

    //  FAQ Slider
    public function Update(Request $request, $id){
        $validateDate = $request->validate([
            'title' => 'required|min:4',
            'description' => 'required|min:5',
        ],
        [
            'title.required' => 'Title must be 4 characters',
            'description.required' => 'Description must be 5 characters',
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
    
            unlink($old_image);
            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $last_img,
                'created_at' => Carbon::now()
            ]);
    
            return Redirect()->back()->with('success','Slider Updated Successfully');
        } 
        else{
            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'created_at' => Carbon::now()
            ]);

            return Redirect()->route('home.slider')->with('success','Slider Update Successfully');
        }
        
    }

    //  Delete Slider
    public function Delete($id){
        $image = Slider::find($id);
        $old_image = $image->image;
        unlink($old_image);
        Slider::find($id)->delete();
        return Redirect()->back()->with('success','Slider Delete Successfully');
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

    // Admin About
    public function About(){
        $abouts = About::latest()->get();
        return view('admin.about.index',compact('abouts'));
    }

    // Add About
    public function AddAbout(){
        return view('admin.about.create');
    }

    // Store About
    public function StoreAbout(Request $request){
        $validateDate = $request->validate([
            'title' => 'required|min:4',
            'sort_desc' => 'required|min:10',
            'long_desc' => 'required|min:20',
        ],
        [
            'title.required' => 'Please Input About Title',
            'title.min' => 'Title Longer Then 4 Characters',
            'sort_desc.required' => 'Please Input About Sort Description',
            'sort_desc.min' => 'Title Longer Then 10 Characters',
            'long_desc.required' => 'Please Input About Long Description',
            'long_desc.min' => 'Title Longer Then 20 Characters',
        ]);
        About::insert([
            'title' => $request->title,
            'sort_desc' => $request->sort_desc,
            'long_desc' => $request->long_desc,
        ]);
        return Redirect()->route('home.about')->with('success','About Created Successfully');
    }

    // Edit About
    public function EditAbout($id){
        $abouts = About::find($id);
        return view('admin.about.edit',compact('abouts'));
    }

    // Update About
    public function UpdateAbout(Request $request, $id){
        $validateDate = $request->validate([
            'title' => 'required|min:4',
            'sort_desc' => 'required|min:10',
            'long_desc' => 'required|min:20',
        ],
        [
            'title.required' => 'Please Input About Title',
            'title.min' => 'Title Longer Then 4 Characters',
            'sort_desc.required' => 'Please Input About Sort Description',
            'sort_desc.min' => 'Title Longer Then 10 Characters',
            'long_desc.required' => 'Please Input About Long Description',
            'long_desc.min' => 'Title Longer Then 20 Characters',
        ]);
        About::find($id)->update([
            'title' => $request->title,
            'sort_desc' => $request->sort_desc,
            'long_desc' => $request->long_desc,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->route('home.about')->with('success','About Update Successfully');
    }

    // Delete About
    public function DeleteAbout($id){
        About::find($id)->delete();
        return Redirect()->back()->with('success','About Delete Successfully');
    }

    // Admin Contact Page
    public function AdminContact(Request $request){
        $contacts = Contact::all();
        return view('admin.contact.index',compact('contacts'));
    }

    // add contact
    public function AddConact(){
        return view('admin.contact.create');
    }

    // Store Contact
    public function StoreContact(Request $request){
        Contact::insert([
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
        ]);
        return Redirect()->route('admin.contact')->with('success','Contact Created Successfully');
    }

    // Edit Contact
    public function EditContact($id){
        $contacts = Contact::find($id);
        return view('admin.contact.edit',compact('contacts'));
    }
    
    // Update Contact
    public function UpdateContact(Request $request, $id){
        Contact::find($id)->update([
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
        ]);
        return Redirect()->route('admin.contact')->with('success','About Update Successfully');
    }

    // Delete Contact
    public function DeleteContact($id){
        Contact::find($id)->delete();
        return Redirect()->back()->with('success','Contact Delete Successfully');
    }

    // Message
    public function AdminMessage(){
        $message = ContactForm::all();
        return view('admin.contact.message',compact('message'));
    }

    // Delete Message
    public function DeleteMessage($id){
        ContactForm::find($id)->delete();
        return Redirect()->back()->with('success','Message Delete Successfully');
    }
}
