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
    
        // Data insert use Eloquent ORM & Models
        SubCatagory::insert([
            'category_id'=> $request->category_id,
            'sub_category_name' => $request->sub_category_name,
            'show_on_menu' => $request->show_on_menu,
            'sub_catagory_order' => $request->sub_catagory_order,
        ]);
        return Redirect()->back()->with('success','Insert Category Successfully');

    }

}
