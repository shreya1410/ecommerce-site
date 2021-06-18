<?php


namespace App\Repositories\AdminUser;

interface AdminUserInterface
{
    public function getAllAdmins();

    public function create(array $attributes);

    public function update($id,array $attributes);

    public function delete($id);
}
