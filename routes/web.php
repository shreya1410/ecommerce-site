<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Admin\productController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\PagesController;

use App\Http\Controllers\User\UserCategoryController;

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

Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::resource('admin/category',categoryController::class);
Route::resource('admin/product',productController::class);
Route::resource('admin/adminuser',AdminUserController::class);
Route::resource('admin/productimage',FileController::class);
Route::resource('admin/pages',PagesController::class);


Route::get('all_categories',[UserCategoryController::class,'all_categories']);
Route::get('all_Category_Products',[UserCategoryController::class,'allCategoryProducts']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
