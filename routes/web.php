<?php

use Illuminate\Support\Facades\Route;
use App\Models\User; 
use App\Http\Controllers\CategoryController; 
use App\Http\Controllers\BrandController; 
use App\Http\Controllers\AuthControllar; 
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $brands = DB::table('brands')->get();
    return view('home',compact('brands'));
});
// Auth Controller
Route::get('/user/logout',[AuthControllar::class,'Logout'])->name('user.logout');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // use Models
    // $users = User::all(); 
    return view('admin.index');
})->name('dashboard');

// Category Controller
Route::get('/category/all',[CategoryController::class,'AallCategory'])->name('all.category');
Route::post('/category/add',[CategoryController::class,'AddCategory'])->name('store.category'); 
Route::get('/category/edit/{id}',[CategoryController::class,'EditCategory']);
Route::post('/category/update/{id}',[CategoryController::class,'UpdateCategory']);
Route::get('/softdelete/category/{id}',[CategoryController::class,'SoftDelete']);
Route::get('/category/restore/{id}',[CategoryController::class,'Restore']);
Route::get('/category/pdelete/{id}',[CategoryController::class,'PDelete']);

// Brand Controller
Route::get('/brand/all',[BrandController::class,'AllBrand'])->name('all.brand');
Route::post('/brand/add',[BrandController::class,'StoreBrand'])->name('store.brand'); 
Route::get('/brand/edit/{id}',[BrandController::class,'Edit']);
Route::post('/brand/update/{id}',[BrandController::class,'Update']);
Route::get('/brand/delete/{id}',[BrandController::class,'Delete']);

// Home Controller, Slider
Route::get('/home/slider',[HomeController::class,'HomeSlider'])->name('home.slider'); 
Route::get('/add/slider',[HomeController::class,'AddSlider'])->name('add.slider'); 
Route::post('/store/slider',[HomeController::class,'StoreSlider'])->name('store.slider'); 
Route::get('/slider/edit/{id}',[HomeController::class,'Edit']);
Route::post('/slider/update/{id}',[HomeController::class,'Update']);
Route::get('/slider/delete/{id}',[HomeController::class,'Delete']);