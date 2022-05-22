<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard',[UserController::class,'getUsers'])->name('dashboard');
});

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


// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {

//         return view('dashboard');
//     })->name('dashboard');
// });
