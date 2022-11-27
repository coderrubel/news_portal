<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
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
        // Data update use Eloquent ORM & Models
        $setting = Setting::find($id);
        // Data update use Query Builder
        // $categories = DB::table('categories')->where('id',$id)->first();
        // return view('admin.news.edit');
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



   }
