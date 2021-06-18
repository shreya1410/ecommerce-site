<?php

namespace App\Repositories\Category;

use App\Models\category;

class CategoryRepository implements CategoryInterface
{
    private $model;

    public function __construct(category $model){
        $this->model=$model;
    }

    public function getAllCategory()
    {
        // TODO: Implement getAllCategory() method.
        return $this->model->all();
    }


    public function create(array $attributes)
    {
        $category = new category;
        $category->name = $attributes['name'];
        return $category->save();

    }

    public function update($id, array $attributes)
    {
        // TODO: Implement update() method.

        $category = $this->model->findOrFail($id);
        $category->update($attributes);
        return $category;
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        $this->model->find($id)->delete();
        return true;
    }
}
