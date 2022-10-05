<?php

use Illuminate\Support\Facades\Route;
use App\Models\User; 
use App\Http\Controllers\CategoryController; 
use App\Http\Controllers\BrandController; 
use App\Http\Controllers\AuthControllar; 
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
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
/*
Route::get('/', function () {
    $brands = DB::table('brands')->get();
    $abouts = DB::table('abouts')->first();
    return view('home',compact('brands','abouts'));
});
*/
// Home page
Route::view('/','pages/home');

// FAQ Page
Route::get('/faq',[HomeController::class,'faqPage'])->name('faq');

// About Page
Route::get('/about',[HomeController::class,'aboutPage'])->name('about');

// Contact Page
Route::get('/contact',[ContactController::class,'Contact'])->name('contact');
Route::post('/contact/form',[ContactController::class,'ContactForm'])->name('contact.form');


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

// Home Controller
// Slider
Route::get('/home/slider',[HomeController::class,'HomeSlider'])->name('home.slider'); 
Route::get('/add/slider',[HomeController::class,'AddSlider'])->name('add.slider'); 
Route::post('/store/slider',[HomeController::class,'StoreSlider'])->name('store.slider'); 
Route::get('/slider/edit/{id}',[HomeController::class,'Edit']);
Route::post('/slider/update/{id}',[HomeController::class,'Update']);
Route::get('/slider/delete/{id}',[HomeController::class,'Delete']);

// About
Route::get('/home/about',[HomeController::class,'About'])->name('home.about');
Route::get('/add/about',[HomeController::class,'AddAbout'])->name('add.about');
Route::post('/store/about',[HomeController::class,'StoreAbout'])->name('store.about');
Route::get('/about/edit/{id}',[HomeController::class,'EditAbout']);
Route::post('/about/update/{id}',[HomeController::class,'UpdateAbout']);
Route::get('about/delete/{id}',[Homecontroller::class,'DeleteAbout']);

// Contact
Route::get('/admin/contact/',[HomeController::class,'AdminContact'])->name('admin.contact');
Route::get('/add/contact/',[HomeController::class,'AddConact'])->name('add.contact');
Route::post('/store/contact/',[HomeController::class,'StoreContact'])->name('store.contact');
Route::get('/contact/edit/{id}',[HomeController::class,'EditContact']);
Route::post('/contact/update/{id}',[HomeController::class,'UpdateContact']);
Route::get('/contact/delete/{id}',[HomeController::class,'DeleteContact']);
Route::get('/admin/message',[HomeController::class,'AdminMessage'])->name('admin.message');
Route::get('/contact/delete/{id}',[HomeController::class,'DeleteMessage']);