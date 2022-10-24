<?php

namespace App\Http\Controllers;

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
        // Eloquent ORM
        $post = Post::latest()->paginate(15);
        $subcagagorys = SubCatagory::with('rCaregory')->latest()->get();
       // $trachCat =  Post::onlyTrashed()->latest()->paginate(15);
        return view('admin.post.allpost',compact('post','subcagagorys'));
    }

    // Add Post
    public function AddPost(Request $request){
        // form validate
        $validated = $request->validate([
            // 'post_title' => 'required|unique:posts|max:50|min:3',
            // 'post_detail' => 'required|unique:posts',
            // 'show_on_menu' => 'required',
        ],
        [
            // custom error message
            // 'post_title.required'=>'Please Input Post Title',
            // 'post_title.unique'=>'Please Input Unique Post Title',
            // 'post_title.max'=>'Category Name Less Then 50 Character',
            // 'post_title.min'=>'Category Name More Then 2 Character',
            // 'post_detail.required'=>'Please Input Post Details',
        ]);

        // Data insert use Eloquent ORM & Models
        Post::insert([
            'sub_category_id' => $request->sub_category_id,
            'post_title' => $request->post_title,
            'post_detail' => $request->post_detail,
            'visitors' => $request->visitors,
            'is_share' => $request->is_share,
            'is_comment' => $request->is_comment,
        ]);

        return Redirect()->back()->with('success','Insert Category Successfully');

    }
   }
