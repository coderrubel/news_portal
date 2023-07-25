<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\specialist;
class SpecialistController extends Controller
{
     // Login chack
     public function __construct(){
        $this->middleware('auth');
    }

    public function Aallspecialist(){
        $specs = specialist::latest()->paginate(10);
        return view('admin.specialist.index',compact('specs'));
    }

    // Add Specialist
    public function Addspecialist(Request $request){
        // form validate
        $validated = $request->validate([
            'spec' => 'required|unique:specialists|max:50|min:3',
        ],
        [
            'spec.required'=>'Please Input Specialist Name',
            'spec.unique'=>'Please Input Unique Specialist Name',
            'spec.max'=>'Specialist Name Less Then 50 Character',
            'spec.min'=>'Specialist Name More Then 4 Character',
        ]);
        specialist::insert([
            'spec' => $request->spec,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->back()->with('success','Specialist Add Successfully');

    }

    // Edit spec
    public function Edit($id){
        $specs = specialist::find($id);
        return view('admin.specialist.edit',compact('specs'));
    }

    // Update spec
    public function Update(Request $request, $id){
        $update = specialist::find($id)->update([
            'spec' => $request->spec,
        ]);
        return Redirect()->route('all.specialist')->with('success','Update Specialist Successfully');
    }

    // Delete specialist
    public function Delete($id){
        specialist::find($id)->delete();
        return Redirect()->back()->with('success','Deleted Specialist');
    }

}
