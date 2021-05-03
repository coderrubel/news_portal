<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Category;
use Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function AallCategory(){
        // Eloquent ORM
        $categories = Category::latest()->paginate(5);
        $trachCat =  Category::onlyTrashed()->latest()->paginate(2);


        // Query Builder
        // $categories = DB::table('categories')->latest()->get();

        return view('admin.category.allcatagory',compact('categories','trachCat'));
    }

    // Add Category
    public function AddCategory(Request $request){
        // form validate
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:15|min:3',
        ],
        [
            // custom error message
            'category_name.required'=>'Please Input Category Name',
            'category_name.unique'=>'Please Input Unique Category Name',
            'category_name.max'=>'Category Name Less Then 16 Character',
            'category_name.min'=>'Category Name More Then 2 Character',
        ]);

        // Data insert use Eloquent ORM & Models
        Category::insert([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);

        // Data insert use Query Builder
        //  $data['category_name'] = $request->category_name;
        //  $data['user_id'] = Auth::user()->id;
        //  DB::table('categories')->insert($data);

        return Redirect()->back()->with('success','Insert Category Successfully');

    }

    // Edit Category
    public function EditCategory($id){
        // Data update use Eloquent ORM & Models
        $categories = Category::find($id);
        // Data update use Query Builder
        // $categories = DB::table('categories')->where('id',$id)->first();

        return view('admin.category.edit',compact('categories'));
    }

    // Update Category
    public function UpdateCategory(Request $request, $id){
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:15|min:3',
        ]);
        $update = Category::find($id)->update([
            'category_name' => $request->category_name,
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
        return Redirect()->back()->with('success','Category Restore Successfully');
    }

}
