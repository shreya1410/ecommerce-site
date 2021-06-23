<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
      'image','name','description','price'
    ];
//    public function categories()
//    {
//        return $this->belongsToMany('App\Models\category','category_products')->withTimestamps();
//    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\category','product_categories')->withTimestamps();
    }
}
