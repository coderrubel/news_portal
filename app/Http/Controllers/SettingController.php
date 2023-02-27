<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class SettingController extends Controller
{
    // Login chack
    public function __construct(){
        $this->middleware('auth');
    }
    public function Setting(){
        $setting = Setting::latest()->paginate(1);
        return view('admin.news.latestnews',compact('setting'));    
    }

   // Add latest news
   public function AddSetting(Request $request){
    // form validate
    $validated = $request->validate([
        'news_ticker_total' => 'required',
        'news_ticker_status' => 'required',
        ],
        [
            // custom error message
            'news_ticker_total.required'=>'Please Input Intger Number Only',
            'news_ticker_status.required'=>'Please Selecte On',
        ]);

    Setting::insert([
        'news_ticker_total'=> $request->news_ticker_total,
        'news_ticker_status' => $request->news_ticker_status,
    ]);
    return Redirect()->back()->with('success','Update Successfully');

    }
    // Edit Setting
    public function EditSetting($id){
        $setting = Setting::find($id);
       return view('admin.news.edit',compact('setting'));
    }

    // Update Setting
    public function Update(Request $request, $id){
        $validated = $request->validate([
        'news_ticker_total' => 'required',
        'news_ticker_status' => 'required',
        ],
        [
        // custom error message
        'news_ticker_total.required'=>'Please Input Intger Number Only',
        'news_ticker_status.required'=>'Please Selecte On',
        ]);

        $update = Setting::find($id)->update([
            'news_ticker_total'=> $request->news_ticker_total,
            'news_ticker_status' => $request->news_ticker_status,
        ]);
        return Redirect()->route('setting')->with('success','Update Setting Successfully');
    }

    // All User
    public function allUsers(){
        $users = User::get();
        return view('admin.users.index',compact('users'));
    }
    // Edit User
    public function userEdit($id){
        $users = User::find($id);
       return view('admin.users.edit',compact('users'));
    }
    // Update User
    public function userUpdate(Request $request, $id){
        $update = User::find($id)->update([
            'type'=> $request->type,
        ]);
        return Redirect()->route('user.list')->with('success','User Permission Updated Successfully');
    }
    // Delete User
    public function userDelete($id){
        $delete = User::find($id)->delete();
        return Redirect()->back()->with('success','User Delete Successfully');
    }

   }
