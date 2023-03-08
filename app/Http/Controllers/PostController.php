<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use App\Models\Post;
use App\Models\Category;
use App\Models\SubCatagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    // Login chack
    public function __construct(){
        $this->middleware('auth');
    }

    public function AllPost(){
        $post = Post::latest()->paginate(15);
        $activePost = Post::latest()->where('status','active')->paginate(15);
        $inactivePost = Post::latest()->where('status','inactive')->paginate(15);
        $catagory = Category::orderBy('catagory_order','asc')->get();
        $subcagagorys = SubCatagory::with('rCaregory')->latest()->get();
        $trachCat =  Post::onlyTrashed()->latest()->paginate(15);
        return view('admin.post.allpost',compact('post','activePost','inactivePost','catagory','subcagagorys','trachCat'));
    }
    public function storePost(){
        $catagory = Category::orderBy('catagory_order','asc')->get();
        $subcagagorys = SubCatagory::with('rCaregory')->latest()->get();
        return view('admin.post.addpost',compact('catagory','subcagagorys'));
    }
    // Add Post
    public function AddPost(Request $request){
        $validated = $request->validate([
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'post_title' => 'required|unique:posts|max:150|min:3',
            'post_detail' => 'required|min:10',
            'post_photo' => 'required|mimes:jpg,png,jpeg,webp|max:1024',
        ],
        [
            // custom error message
            'category_id.required'=>'Please Select One Category',
            'sub_category_id.required'=>'Please Select One Category',
            'post_title.required'=>'Please Input Post Title',
            'post_title.unique'=>'Please Input Unique Post Title',
            'post_title.max'=>'Post Title Less Then 150 Character',
            'post_title.min'=>'Post Title More Then 3 Character',
            'post_detail.required'=>'Please Input Post Details',
            'post_detail.min'=>'Post Details More Then 10 Character',
            'post_photo.required'=>'Please Input Post Image',
        ]);

        $post_photo = $request->file('post_photo');
        $name_genarate = hexdec(uniqid());
        $img_ext = strtolower($post_photo->getClientOriginalExtension());
        $img_name = $name_genarate.'.'.$img_ext;
        $up_location = 'image/post/';
        $last_img = $up_location.$img_name;
        $post_photo->move($up_location,$img_name);
        Post::insert([
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'post_title' => $request->post_title,
            'post_photo' => $last_img,
            'user_name' => Auth::user()->name,
            'admin_id' => Auth::user()->id,
            'post_detail' => $request->post_detail,
            'visitors' => $request->visitors,
            'status' => $request->status,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->route('all.post')->with('success','Create Post Successfully');

    }
     // Edit Sub Category
     public function EditPost($id){
        $post = Post::find($id);
        $catagory = Category::orderBy('catagory_order','asc')->get();
        $subcagagorys = SubCatagory::with('rCaregory')->latest()->get();

        return view('admin.post.edit',compact('post','catagory','subcagagorys'));
    }
    // Update Post
    public function UpdatePost(Request $request, $id){
        $validated = $request->validate([
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'post_title' => 'required|max:150|min:3',
            'post_detail' => 'required|min:10',
        ],
        [
            // custom error message
            'category_id.required'=>'Please Select One Category',
            'sub_category_id.required'=>'Please Select One Category',
            'post_title.required'=>'Please Input Post Title',
            'post_title.unique'=>'Please Input Unique Post Title',
            'post_title.max'=>'Post Title Less Then 150 Character',
            'post_title.min'=>'Post Title More Then 3 Character',
            'post_detail.required'=>'Please Input Post Details',
            'post_detail.min'=>'Post Details More Then 10 Character',
        ]);
            
            $post_photo = $request->file('post_photo');
            
            if($post_photo){
            $old_image = $request->old_image;

            if(!$old_image == ""){
            unlink($old_image);
                
            $name_genarate = hexdec(uniqid());
            $img_ext = strtolower($post_photo->getClientOriginalExtension());
            $img_name = $name_genarate.'.'.$img_ext;
            $up_location = 'image/post/';
            $last_img = $up_location.$img_name;
            $post_photo->move($up_location,$img_name);
 
            $update = Post::find($id)->update([
                'category_id' => $request->category_id,
                'sub_category_id'=> $request->sub_category_id,
                'post_title' => $request->post_title,
                'post_detail' => $request->post_detail,
                'post_photo' => $last_img,         
                'status' => $request->status,
                'visitors' => $request->visitors,
            ]);
            }
            elseif($old_image == ""){
                $name_genarate = hexdec(uniqid());
                $img_ext = strtolower($post_photo->getClientOriginalExtension());
                $img_name = $name_genarate.'.'.$img_ext;
                $up_location = 'image/post/';
                $last_img = $up_location.$img_name;
                $post_photo->move($up_location,$img_name);
      
                $update = Post::find($id)->update([
                    'category_id' => $request->category_id,
                    'sub_category_id'=> $request->sub_category_id,
                    'post_title' => $request->post_title,
                    'post_detail' => $request->post_detail,
                    'post_photo' => $last_img,
                    'status' => $request->status,
                    'visitors' => $request->visitors,
                ]);
            }

            return Redirect()->route('all.post')->with('success','Update Post Successfully');
        }
        else{
            $update = Post::find($id)->update([
                'category_id' => $request->category_id,
                'sub_category_id'=> $request->sub_category_id,
                'post_title' => $request->post_title,
                'post_detail' => $request->post_detail,
                'status' => $request->status,
                'visitors' => $request->visitors,
            ]);
            return Redirect()->route('all.post')->with('success','Update Post Successfully');
        }    
    }
    
    // SoftDelete Category
     public function SoftDelete($id){
        $delete = Post::find($id)->delete();
        return Redirect()->back()->with('success','Post Removed Successfully');
    }
    // Restore sub Category
    public function Restore($id){
        $delete = Post::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success','Sub Category Restore Successfully');
    }

    // PDelete sub Category
    public function PDelete($id){
        $delete = Post::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success','Sub Category Permanently Deleted');
    }
   }
