<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
     // Login chack
     public function __construct(){
        $this->middleware('auth');
    }
    public function AallSubCategory(){
        // Eloquent ORM
        $subcategories = SubCategory::latest();
        // $trachCat =  SubCategory::onlyTrashed()->latest()->paginate(4);

        return view('admin.subcategory.allsubcatagory',compact('subcategories'));
        // return view('admin.subcategory.allsubcatagory',compact('subcategories','trachCat'));
       
    }

    // Add Category
    public function AddSubCategory(Request $request){
        // form validate
        $validated = $request->validate([
            'sub_category_name' => 'required|unique:SubCategory|max:35|min:3',
            'sub_catagory_order' => 'required|unique:SubCategory|integer',
            'show_on_menu' => 'required',
        ],
        [
            // custom error message
            'sub_category_name.required'=>'Please Input Sub Category Name',
            'sub_category_name.unique'=>'Please Input Unique Sub Category Name',
            'sub_category_name.max'=>'Sub Category Name Less Then 36 Character',
            'sub_category_name.min'=>'Sub Category Name More Then 2 Character',
            'sub_catagory_order.unique'=>'Please Input Unique Integer Number Only',
        ]);

        // Data insert use Eloquent ORM & Models
        SubCategory::insert([
            'sub_category_name' => $request->sub_category_name,
            'show_on_menu' => $request->show_on_menu,
            'sub_catagory_order' => $request->sub_catagory_order,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->back()->with('success','Insert Category Successfully');

    }
/*
    // Edit Category
    public function EditSubCategory($id){
        $categories = SubCategory::find($id);
        return view('admin.category.edit',compact('categories'));
    }

    // Update Category
    public function UpdateSubCategory(Request $request, $id){
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:15|min:3',
        ]);
        $update = SubCategory::find($id)->update([
            'category_name' => $request->category_name,
            'catagory_order' => $request->catagory_order,
            'show_on_menu' => $request->show_on_menu,
            'user_id' => Auth::user()->id
        ]);
        return Redirect()->route('all.category')->with('success','Update Category Successfully');
    }

    // SoftDelete Category
    public function SoftDelete($id){
        $delete = SubCategory::find($id)->delete();
        return Redirect()->back()->with('success','Category Soft Delete Successfully');
    }

    // Restore Category
    public function Restore($id){
        $delete = SubCategory::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success','Category Restore Successfully');
    }

    // PDelete Category
    public function PDelete($id){
        $delete = SubCategory::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success','Category Permanently Deleted');
    }
*/
}
