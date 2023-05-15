<?php

use Illuminate\Support\Facades\Route;
use App\Models\User; 
use App\Http\Controllers\CategoryController; 
use App\Http\Controllers\SubCategoryController; 
use App\Http\Controllers\HeaderAdsController; 
use App\Http\Controllers\HeaderAds1Controller; 
use App\Http\Controllers\SidebarAdsController; 
use App\Http\Controllers\SidebarAds1Controller; 
use App\Http\Controllers\BrandController; 
use App\Http\Controllers\AuthControllar; 
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\DoctorController;


// Home page
Route::get('/',[PageController::class,'homePage'])->name('home');

// Post Details
Route::get('/post_details/{id}',[PageController::class,'PostDetails'])->name('post_details');

// Category page
Route::get('/allpost/{id}',[PageController::class,'Category'])->name('allpost');

// FAQ Page
Route::get('/faq',[PageController::class,'faqPage'])->name('faq');

// About Page
Route::get('/about',[PageController::class,'aboutPage'])->name('about');

// Doctor Page
Route::get('/doctor_list',[PageController::class,'doctorPage'])->name('doctor_list');
Route::get('/doctor_details/{id}',[PageController::class,'doctorView'])->name('doctor_details');
Route::post('search-doctor',[PageController::class,'doctorSearch']);

// Contact Page
Route::get('/contact',[ContactController::class,'Contact'])->name('contact');
Route::post('/contact/form',[ContactController::class,'ContactForm'])->name('contact.form');


// Auth Controller
Route::get('/user/logout',[AuthControllar::class,'Logout'])->name('user.logout');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

// Post Controller
Route::get('/post/store',[PostController::class,'storePost'])->name('all.store');
Route::get('/post/all',[PostController::class,'AllPost'])->name('all.post');
Route::post('/post/add',[PostController::class,'AddPost'])->name('store.post'); 
Route::get('/post/trash',[PostController::class,'TrashPost'])->name('all.trash');
Route::get('/post/edit/{id}',[PostController::class,'EditPost']);
Route::post('/post/update/{id}',[PostController::class,'UpdatePost']);
Route::get('/softdelete/post/{id}',[PostController::class,'SoftDelete']);
Route::get('/post/restore/{id}',[PostController::class,'Restore']);
Route::get('/post/pdelete/{id}',[PostController::class,'PDelete']);
Route::get('get-statusChange',[PostController::class,'statusChange']);

// admin middleware
Route::middleware(['admin'])->group(function () {
// Category Controller
Route::get('/category/all',[CategoryController::class,'AallCategory'])->name('all.category');
Route::post('/category/add',[CategoryController::class,'AddCategory'])->name('store.category'); 
Route::get('/category/edit/{id}',[CategoryController::class,'EditCategory']);
Route::post('/category/update/{id}',[CategoryController::class,'UpdateCategory']);
Route::get('/softdelete/category/{id}',[CategoryController::class,'SoftDelete']);
Route::get('/category/restore/{id}',[CategoryController::class,'Restore']);
Route::get('/category/pdelete/{id}',[CategoryController::class,'PDelete']);
Route::get('get-category',[CategoryController::class,'gCategory']);
Route::get('get-editcategory',[CategoryController::class,'gEditCategory']);

// Sub Category Controller
Route::get('/subcategory/all',[SubCategoryController::class,'AallSubCategory'])->name('all.subcategory');
Route::post('/subcategory/add',[SubCategoryController::class,'AddSubCategory'])->name('store.subcategory'); 
Route::get('/subcategory/edit/{id}',[SubCategoryController::class,'EditSubCategory']);
Route::post('/subcategory/update/{id}',[SubCategoryController::class,'UpdateSubCategory']);
Route::get('/softdelete/subcategory/{id}',[SubCategoryController::class,'SoftDelete']);
Route::get('/subcategory/restore/{id}',[SubCategoryController::class,'Restore']);
Route::get('/subcategory/pdelete/{id}',[SubCategoryController::class,'PDelete']);

// Header ads 1
Route::get('/header1/all',[HeaderAdsController::class,'show'])->name('all.header1');
Route::post('/header1/add',[HeaderAdsController::class,'Store'])->name('store.header1'); 
Route::get('/header1/edit/{id}',[HeaderAdsController::class,'Edit']);
Route::post('/header1/update/{id}',[HeaderAdsController::class,'Update']);
Route::get('/header1/delete/{id}',[HeaderAdsController::class,'Delete']);
// Header ads 2
Route::get('/header2/all',[HeaderAds1Controller::class,'show'])->name('all.header2');
Route::post('/header2/add',[HeaderAds1Controller::class,'Store'])->name('store.header2'); 
Route::get('/header2/edit/{id}',[HeaderAds1Controller::class,'Edit']);
Route::post('/header2/update/{id}',[HeaderAds1Controller::class,'Update']);
Route::get('/header2/delete/{id}',[HeaderAds1Controller::class,'Delete']);
// Sidebar ads 1
Route::get('/sidebar1/all',[SidebarAdsController::class,'show'])->name('all.sidebar1');
Route::post('/sidebar1/add',[SidebarAdsController::class,'Store'])->name('store.sidebar1'); 
Route::get('/sidebar1/edit/{id}',[SidebarAdsController::class,'Edit']);
Route::post('/sidebar1/update/{id}',[SidebarAdsController::class,'Update']);
Route::get('/sidebar1/delete/{id}',[SidebarAdsController::class,'Delete']);
// Sidebar ads 2
Route::get('/sidebar2/all',[SidebarAds1Controller::class,'show'])->name('all.sidebar2');
Route::post('/sidebar2/add',[SidebarAds1Controller::class,'Store'])->name('store.sidebar2'); 
Route::get('/sidebar2/edit/{id}',[SidebarAds1Controller::class,'Edit']);
Route::post('/sidebar2/update/{id}',[SidebarAds1Controller::class,'Update']);
Route::get('/sidebar2/delete/{id}',[SidebarAds1Controller::class,'Delete']);
// Footer ads
Route::get('/brand/all',[BrandController::class,'AllBrand'])->name('all.brand');
Route::post('/brand/add',[BrandController::class,'StoreBrand'])->name('store.brand'); 
Route::get('/brand/edit/{id}',[BrandController::class,'Edit']);
Route::post('/brand/update/{id}',[BrandController::class,'Update']);
Route::get('/brand/delete/{id}',[BrandController::class,'Delete']);
// Doctor
Route::get('/doctor/all',[DoctorController::class,'AllDoctor'])->name('all.doctor');
Route::post('/doctor/add',[DoctorController::class,'AddDoctor'])->name('add.doctor'); 
Route::get('/doctor/store',[DoctorController::class,'storeDoctor'])->name('store.doctor');
Route::get('/doctor/edit/{id}',[DoctorController::class,'Edit']);
Route::post('/doctor/update/{id}',[DoctorController::class,'Update']);
Route::get('/doctor/delete/{id}',[DoctorController::class,'Delete']);
// Setting Controller
Route::get('/setting',[SettingController::class,'Setting'])->name('setting');
Route::post('/setting/add',[SettingController::class,'AddSetting'])->name('store.news'); 
Route::get('/setting/edit/{id}',[SettingController::class,'EditSetting']);
Route::post('/setting/update/{id}',[SettingController::class,'Update']);
// logo
Route::get('/logo/all',[LogoController::class,'AllLogo'])->name('all.logo');
Route::post('/logo/add',[LogoController::class,'StoreLogo'])->name('store.logo'); 
Route::get('/logo/edit/{id}',[LogoController::class,'Edit']);
Route::post('/logo/update/{id}',[LogoController::class,'Update']);
Route::get('/logo/delete/{id}',[LogoController::class,'Delete']);

// All Users
Route::get('/user/list',[SettingController::class,'allUsers'])->name('user.list');
Route::get('/user/edit/{id}',[SettingController::class,'userEdit']);
Route::post('/user/update/{id}',[SettingController::class,'userUpdate']);
Route::get('/user/delete/{id}',[SettingController::class,'userDelete']);

// Home Controller
// Slider
Route::get('/home/slider',[HomeController::class,'HomeSlider'])->name('home.slider'); 
Route::get('/add/slider',[HomeController::class,'AddSlider'])->name('add.slider'); 
Route::post('/store/slider',[HomeController::class,'StoreSlider'])->name('store.slider'); 
Route::get('/slider/edit/{id}',[HomeController::class,'Edit']);
Route::post('/slider/update/{id}',[HomeController::class,'Update']);
Route::get('/slider/delete/{id}',[HomeController::class,'Delete']);

// end admin middleware
});

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