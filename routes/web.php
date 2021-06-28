<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Admin\productController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\MainCategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductItemsController;

use App\Http\Controllers\Admin\productImageController;
use App\Http\Controllers\ContactUsController;



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

Route::resource('admin/maincategory',MainCategoryController::class);
Route::resource('admin/subcategory',SubCategoryController::class);
Route::resource('admin/products',ProductItemsController::class);
//Route::resource('admin/category',categoryController::class);
//Route::resource('admin/product',productController::class);
Route::resource('admin/adminuser',AdminUserController::class);
//Route::resource('admin/productimage',FileController::class);
Route::resource('admin/pages',PagesController::class);
//Route::resource('admin/image',productImageController::class);




Route::get('/{any}', function () {
    return view('home');
})->where('any', '.*');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
