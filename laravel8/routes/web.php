<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\MultiimageController;
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

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', function () {
    return view('welcome');
});

// User routes
Route::middleware(['auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard',[UserController::class,'getUsers'])->name('dashboard');
});

//Logout routes here
Route::get('user/logout',[UserController::class,'Logout'])->name('user.logout');


// Category routes  

Route::get('/category/all',[CategoryController::class,'getALlCategories'])->name('all.category');
Route::post('/category/add',[CategoryController::class,'addCategory'])->name('store.category');
Route::get('/category/edit/{id}',[CategoryController::class,'editCategory']);
Route::post('/category/update/{id}',[CategoryController::class,'updateCategory']);
Route::get('/softDelete/category/{id}',[CategoryController::class,'softDelete']);
Route::get('/category/restore/{id}',[CategoryController::class,'restoreCategory']);
Route::get('category/permanent-delete/{id}',[CategoryController::class,'permanentDeleteCategory']);


// Brands routes  

Route::get('/brand/all',[BrandController::class,'getAllBrand'])->name('all.brand');
Route::post('/brand/add',[BrandController::class,'addBrand'])->name('store.brand');
Route::get('/brand/edit/{id}',[BrandController::class,'editBrand']);
Route::post('/brand/update/{id}',[BrandController::class,'updateBrand']);
Route::get('/brand/delete/{id}',[BrandController::class,'deleteBrand']);

// Multiple image routes
Route::get('/multiple/image',[MultiimageController::class,'multipleImage'])->name('multiple.image');
Route::post('/multipleimage/add',[MultiimageController::class,'addMultipleImage'])->name('add.multipleimage');




// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {

//         return view('dashboard');
//     })->name('dashboard');
// });
