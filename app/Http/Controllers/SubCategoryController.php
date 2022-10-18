<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\SubCatagory;
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
        $subcagagorys = SubCatagory::latest()->get();

        return view('admin.subcategory.allsubcatagory',compact('subcagagorys'));
       
    }

    // Add Category
    public function AddSubCategory(Request $request){
        // form validate
        $validated = $request->validate([
            'category_id' => 'required',
            'sub_category_name' => 'required|max:35|min:3',
            'sub_catagory_order' => 'required',
            'show_on_menu' => 'required',
        ],
        [
            // custom error message
            'sub_category_name.required'=>'Please Input Sub Category Name',
            // 'sub_category_name.unique'=>'Please Input Unique Sub Category Name',
            'sub_category_name.max'=>'Category Name Less Then 36 Character',
            'sub_category_name.min'=>'Category Name More Then 3 Character',
            // 'sub_catagory_order.unique'=>'Please Input Unique Integer Number Only',
        ]);
        // Data insert use Eloquent ORM & Models
        SubCatagory::insert([
            'category_id'=> $request->category_id,
            'sub_category_name' => $request->sub_category_name,
            'show_on_menu' => $request->show_on_menu,
            'sub_catagory_order' => $request->sub_catagory_order,
        ]);
        return Redirect()->back()->with('success','Insert Category Successfully');

    }
    // Edit Sub Category
    public function EditSubCategory($id){
        // Data update use Eloquent ORM & Models
        $subcagagorys = SubCatagory::find($id);
        // Data update use Query Builder
        // $categories = DB::table('categories')->where('id',$id)->first();

        return view('admin.subcategory.edit',compact('subcagagorys'));
    }
    // Update Category
    public function UpdateSubCategory(Request $request, $id){
        // $validated = $request->validate([
        //     'sub_category_name' => 'required|unique:subcagagorys|max:15|min:3',
        // ]);
        $update = SubCatagory::find($id)->update([
            'sub_category_name' => $request->sub_category_name,
            'sub_catagory_order' => $request->sub_catagory_order,
            'show_on_menu' => $request->show_on_menu,
        ]);
        return Redirect()->route('all.subcategory')->with('success','Update Category Successfully');
    }
    // SoftDelete Category
    public function SoftDelete($id){
        $delete = SubCatagory::find($id)->delete();
        return Redirect()->back()->with('success','Category Soft Delete Successfully');
    }

   
}
