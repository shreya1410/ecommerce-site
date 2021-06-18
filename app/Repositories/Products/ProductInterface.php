<?php

namespace App\Repositories\Products;

interface ProductInterface
{
    public function getAllProducts();

    public function create(array $attributes);

    public function update($id,array $attributes);

    public function delete($id);
}
