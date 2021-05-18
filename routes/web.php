<?php

use Illuminate\Support\Facades\Route;
use App\Models\User; 
use App\Http\Controllers\CategoryController; 
use App\Http\Controllers\BrandController; 
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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // use Models
     $users = User::all(); 
    return view('dashboard',compact('users'));
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