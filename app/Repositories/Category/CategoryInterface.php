<?php



namespace App\Repositories\Category;




interface CategoryInterface
{
        public function getAllCategory();

        public function create( array $attributes);

        public function update($id,array $attributes);

        public function delete($id);

}
