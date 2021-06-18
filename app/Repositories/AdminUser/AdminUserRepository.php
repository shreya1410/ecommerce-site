<?php

namespace App\Repositories\AdminUser;

use App\Models\adminUser;

class AdminUserRepository implements AdminUserInterface
{
    private $admins;

    public function __construct(adminUser $admins)
    {
        $this->admins=$admins;
    }

    public function getAllAdmins()
    {
        // TODO: Implement getAllAdmins() method.
        return $this->admins->all();
    }

    public function create(array $attributes)
    {
        // TODO: Implement create() method.
        $admin = new adminUser;
        $admin->admin_name = $attributes['admin_name'];
        $admin->admin_email = $attributes['admin_email'];
        $admin->admin_address = $attributes['admin_address'];
        $admin->contact = $attributes['contact'];
        return $admin->save();

    }


    public function update($id, array $attributes)
    {
        // TODO: Implement update() method.
        $adminuser = $this->admins->findOrFail($id);
        $adminuser->update($attributes);
        return $adminuser;
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        $this->admins->find($id)->delete();
        return true;
    }
}
