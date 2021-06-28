<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\main_category;
use App\Models\product_categories;
use App\Models\sub_category;
use Illuminate\Http\Request;

class UserCategoryController extends Controller
{
    public function all_categories(){
        $categories = main_category::all();
        return response()->json($categories);
    }



    public function allCategoryProducts($id){
        return product_categories::join('products','products.id','product_categories.product_id')
            ->join('categories','categories.id','product_categories.category_id')
            ->where('categories.id',$id)->get();
    }

    public function all_sub_categories($id){
        $subcategories = sub_category::where('main_category_id',$id)->get();
        return response()->json($subcategories);
    }


}
