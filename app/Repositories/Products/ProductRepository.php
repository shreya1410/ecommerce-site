<?php

namespace App\Repositories\Products;

use App\Models\product;

class ProductRepository implements ProductInterface
{
    private  $pro;
    public function __construct(product $pro)
    {
        $this->pro= $pro;

    }
    public function getAllProducts()
    {
        // TODO: Implement getAllProducts() method.
        return $this->pro->all();
    }


    public function create(array $attributes)
    {
        // TODO: Implement create() method.
        $product = new product;
        $product->name= $attributes['name'];
        $product->description = $attributes['description'];
        $product->price = $attributes['price'];
        return $product->save();
    }

    public function update($id,array $attributes){
        $product  = $this->pro->findOrFail($id);
        $product->update($attributes);
        return $product;

    }
    public function delete($id)
    {
        // TODO: Implement delete() method.
        $this->pro->find($id)->delete();
        return true;
    }
}
