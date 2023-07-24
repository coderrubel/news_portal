<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class DivisionController extends Controller
{
    // Login chack
    public function __construct(){
        $this->middleware('auth');
    }

    public function Aalldivision(){
        $divisions = Division::latest()->paginate(10);
        return view('admin.division.index',compact('divisions'));
    }

    // Add Category
    public function Adddivision(Request $request){
        // form validate
        $validated = $request->validate([
            'division' => 'required|unique:divisions|max:35|min:5',
        ],
        [
            // custom error message
            'division.required'=>'Please Input Division Name',
            'division.unique'=>'Please Input Unique Category Name',
            'division.max'=>'Category Name Less Then 36 Character',
            'division.min'=>'Category Name More Then 4 Character',
        ]);
        Division::insert([
            'division' => $request->division,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->back()->with('success','Division Add Successfully');

    }

    // Edit division
    public function Editdivision($id){
        $divisions = Division::find($id);
        return view('admin.division.edit',compact('divisions'));
    }

    // Update division
    public function Updatedivision(Request $request, $id){
        $update = Division::find($id)->update([
            'division' => $request->division,
        ]);
        return Redirect()->route('all.division')->with('success','Update Division Successfully');
    }

    // Delete division
    public function Delete($id){
        Division::find($id)->delete();
        return Redirect()->back()->with('success','Division Deleted');
    }

    // division add on Post page
    public function gdivision(Request $request){
        $id = $request->id ;
        $cc = District::where('id', $id)->first();
        echo $cc->division_id;

    }
    public function gEditdivision(Request $request){
        $id = $request->id ;
        $editcat = District::where('id', $id)->first();
        echo $editcat->division_id;
    }

}
