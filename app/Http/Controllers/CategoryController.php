<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\SubCatagory;
class CategoryController extends Controller
{
    // Login chack
    public function __construct(){
        $this->middleware('auth');
    }

    public function AallCategory(){
        // Eloquent ORM
        $categories = Category::latest()->paginate(5);
        $trachCat =  Category::onlyTrashed()->latest()->paginate(4);
        return view('admin.category.allcatagory',compact('categories','trachCat'));
    }

    // Add Category
    public function AddCategory(Request $request){
        // form validate
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:35|min:3',
            'catagory_order' => 'required|unique:categories|integer',
            'show_on_menu' => 'required',
        ],
        [
            // custom error message
            'category_name.required'=>'Please Input Category Name',
            'category_name.unique'=>'Please Input Unique Category Name',
            'category_name.max'=>'Category Name Less Then 36 Character',
            'category_name.min'=>'Category Name More Then 2 Character',
            'catagory_order.unique'=>'Please Input Unique Integer Number Only',
        ]);

        // Data insert use Eloquent ORM & Models
        Category::insert([
            'category_name' => $request->category_name,
            'show_on_menu' => $request->show_on_menu,
            'catagory_order' => $request->catagory_order,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->back()->with('success','Insert Category Successfully');

    }

    // Edit Category
    public function EditCategory($id){
        // Data update use Eloquent ORM & Models
        $categories = Category::find($id);
        return view('admin.category.edit',compact('categories'));
    }

    // Update Category
    public function UpdateCategory(Request $request, $id){
        // $validated = $request->validate([
        //     'category_name' => 'required|unique:categories|max:15|min:3',
        // ]);
        $update = Category::find($id)->update([
            'category_name' => $request->category_name,
            'catagory_order' => $request->catagory_order,
            'show_on_menu' => $request->show_on_menu,
            'user_id' => Auth::user()->id
        ]);
        return Redirect()->route('all.category')->with('success','Update Category Successfully');
    }

    // SoftDelete Category
    public function SoftDelete($id){
        $delete = Category::find($id)->delete();
        return Redirect()->back()->with('success','Category Soft Delete Successfully');
    }

    // Restore Category
    public function Restore($id){
        $delete = Category::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success','Category Restore Successfully');
    }

    // PDelete Category
    public function PDelete($id){
        $delete = Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success','Category Permanently Deleted');
    }

    // Category add on Post page
    public function gCategory(Request $request){
        $id = $request->id ;
        $cc = SubCatagory::where('id', $id)->first();
        echo $cc->category_id;

    }
    public function gEditCategory(Request $request){
        $id = $request->id ;
        $editcat = SubCatagory::where('id', $id)->first();
        echo $editcat->category_id;
    }

}
