<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\UserCategoryController;



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
Route::get('all_Category_Products/{id}',[UserCategoryController::class,'allCategoryProducts']);




