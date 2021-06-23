<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $fillable =[
        'name','category_description'
    ];
//    public function products()
//    {
//        return $this->belongsToMany('App\Models\product','category_products')->withTimestamps();
//    }

    public function products()
    {
        return $this->belongsToMany('App\Models\product','product_categories')->withTimestamps();
    }
}
