<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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
Route::get('/admin',function(){
    return view('banner.home');
});

//user section

Route::get('useraccount',[UserController::class,'index']);
Route::post('save',[UserController::class,'store']);
Route::get('list',[UserController::class,'show']);
Route::get('delete/{id}',[UserController::class,'delete']);
Route::get('edit/{id}',[UserController::class,'edit']);
Route::post('update',[userController::class,'updatestore']);

//Banner section

Route::get('/banner',[BannerController::class,'index']);
Route::get('/banner/addbanner',[BannerController::class,'create']);
Route::post('/banner/addbanner',[BannerController::class,'store']);
Route::get('/banner/listbanner',[BannerController::class,'show']);
Route::get('/banner/delete/{id}',[BannerController::class,'delete']);
Route::get('/banner/edit/{id}',[BannerController::class,'edit']);
Route::post('/banner/update',[BannerController::class,'update']);
Route::get('/banner/trash',[BannerController::class,'trash'])->name('banner.trash');
Route::get('/banner/restore/{id}',[BannerController::class,'restore'])->name('banner.restore');
Route::get('/banner/force-delete/{id}',[BannerController::class,'forceDelete'])->name('banner.force-delete');

//Category

Route::get('/category',[CategoryController::class,'index']);
Route::get('/category/add',[CategoryController::class,'create']);
Route::post('/category/add',[CategoryController::class,'store']);
Route::get('/category/list',[CategoryController::class,'show'])->name('category.list');
Route::get('/category/delete/{id}',[CategoryController::class,'delete']);
Route::get('/category/edit/{id}',[CategoryController::class,'edit']);
Route::post('/category/update',[CategoryController::class,'update']);
Route::get('/category/trash',[CategoryController::class,'trash'])->name('category.trash');
Route::get('/category/restore/{id}',[CategoryController::class,'restore'])->name('category.restore');
Route::get('/category/force-delete/{id}',[CategoryController::class,'forceDelete'])->name('category.force-delete');

//product

Route::get('/product',[ProductController::class,'index']);
Route::get('/product/add',[ProductController::class,'create']);
Route::post('/product/add',[ProductController::class,'store']);
Route::get('/product/list',[ProductController::class,'show']);
Route::get('/product/delete/{id}',[ProductController::class,'delete']);
Route::get('/product/edit/{id}',[ProductController::class,'edit']);
Route::post('/product/update',[ProductController::class,'update']);
Route::get('/product/trash',[ProductController::class,'trash'])->name('product.trash');
Route::get('/product/restore/{id}',[ProductController::class,'restore'])->name('product.restore');
Route::get('/product/force-delete/{id}',[ProductController::class,'forceDelete'])->name('product.force-delete');
Route::get('/product/display/{id}',[ProductController::class,'display']);
Route::get('/product/extraimages/{id}',[ProductController::class,'extraImages'])->name('product.extraImages');
Route::post('/product/extraimages',[ProductController::class,'extraImagesStore'])->name('product.extraImagesStore');
Route::get('/product/productimages/{id}',[ProductController::class,'productImages'])->name('product.showImages');

