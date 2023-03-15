<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\SubCatagory;
use App\Models\Category;
use App\Models\Post;
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
        $catagory = Category::orderBy('catagory_order','asc')->get();
        $subcagagorys = SubCatagory::with('rCaregory')->latest()->get();
        $trachCat =  SubCatagory::onlyTrashed()->latest()->paginate(4);
        return view('admin.subcategory.allsubcatagory',compact('catagory','subcagagorys','trachCat'));    
    }
   
    // Add sub Category
    public function AddSubCategory(Request $request){
        // form validate
        $validated = $request->validate([
            'sub_category_name' => 'required|unique:sub_catagories|max:35|min:3',
        ],
        [
            // custom error message
            'sub_category_name.required'=>'Please Input Sub Category Name',
            'sub_category_name.unique'=>'Please Input Unique Sub Category Name',
            'sub_category_name.max'=>'Category Name Less Then 36 Character',
            'sub_category_name.min'=>'Category Name More Then 3 Character',
        ]);
        // Data insert use Eloquent ORM & Models
        SubCatagory::insert([
            'category_id'=> $request->category_id,
            'sub_category_name' => $request->sub_category_name,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->back()->with('success','Insert Category Successfully');

    }
    // Edit Sub Category
    public function EditSubCategory($id){
        $subcagagorys = SubCatagory::find($id);
        $catagory = Category::orderBy('catagory_order','asc')->get();

        return view('admin.subcategory.edit',compact('subcagagorys','catagory'));
    }
    // Update Category
    public function UpdateSubCategory(Request $request, $id){
        $validated = $request->validate([
            'sub_category_name' => 'required|max:35|min:3',
        ],
        [
            // custom error message
            'sub_category_name.required'=>'Please Input Sub Category Name',
            'sub_category_name.max'=>'Category Name Less Then 36 Character',
            'sub_category_name.min'=>'Category Name More Then 3 Character',
        ]);
        $update = SubCatagory::find($id)->update([
            'category_id'=> $request->category_id,
            'sub_category_name' => $request->sub_category_name,
        ]);
        return Redirect()->route('all.subcategory')->with('success','Update Sub Category Successfully');
    }
    // SoftDelete Category
    public function SoftDelete($id){
        $delete = SubCatagory::find($id)->delete();
        return Redirect()->back()->with('success','Sub Category Soft Delete Successfully');
    }
    // Restore sub Category
    public function Restore($id){
        $delete = SubCatagory::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success','Sub Category Restore Successfully');
    }

    // PDelete sub Category
    public function PDelete($id){
        $delete = SubCatagory::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success','Sub Category Permanently Deleted');
    }
   
}
