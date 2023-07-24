<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Division;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    // Login chack
    public function __construct(){
        $this->middleware('auth');
    }
    public function Aalldistrict(){
        $divisions = Division::orderBy('id','asc')->get();
        $districts = District::with('rDivision')->latest()->get();
        return view('admin.district.index',compact('districts','divisions'));    
    }
   
    // Add 
    public function Adddistrict(Request $request){
        $validated = $request->validate([
            'district' => 'required|unique:districts|max:35|min:3',
        ],
        [
            'district.required'=>'Please Input District Name',
            'district.unique'=>'Please Input Unique District Name',
            'district.max'=>'District Name Less Then 36 Character',
            'district.min'=>'District Name More Then 3 Character',
        ]);
        District::insert([
            'division_id'=> $request->division_id,
            'district' => $request->district,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->back()->with('success','District Add Successfully');

    }
    // Edit District
    public function EditDistrict($id){
        $districts = District::find($id);
        $divisions = Division::orderBy('id','asc')->get();

        return view('admin.district.edit',compact('districts','divisions'));
    }
    // Update Category
    public function UpdateDistrict(Request $request, $id){
        $validated = $request->validate([
            'district' => 'required|max:25|min:3',
        ],
        [
            // custom error message
            'district.required'=>'Please Input District Name',
            'district.max'=>'District Name Less Then 26 Character',
            'district.min'=>'District Name More Then 3 Character',
        ]);
        $update = District::find($id)->update([
            'division_id'=> $request->division_id,
            'district' => $request->district,
        ]);
        return Redirect()->route('all.district')->with('success','Update Successfully');
    }

    // Delete sub Category
    public function PDelete($id){
        District::find($id)->delete();
        return Redirect()->back()->with('success','District Deleted');
    }
   
}
