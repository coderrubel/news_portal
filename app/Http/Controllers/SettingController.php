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
        // return view('admin.news.latestnews');
        $setting = DB::table('settings')->first();
        return view('admin.news.latestnews',compact('setting'));    
    }

   // Add latest news
   public function AddSetting(Request $request){
    // form validate
    $validated = $request->validate([
        'news_ticker_total' => 'required|intger',
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
    
   }
