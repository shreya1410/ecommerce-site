<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\UserCategoryController;
use App\Http\Controllers\ContactUsController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('all_categories',[UserCategoryController::class,'all_categories']);
Route::get('all_sub_categories/{id}',[UserCategoryController::class,'all_sub_categories']);
Route::get('products/{id}',[UserCategoryController::class,'product_by_subcategory']);
Route::get('productdetail/{slug}',[UserCategoryController::class,'productdetail']);
//Route::get('all_Category_Products/{id}',[UserCategoryController::class,'allCategoryProducts']);

Route::get('all_pages',[UserCategoryController::class,'all_pages']);

Route::post('/submit',[ContactUsController::class,'submit']);
