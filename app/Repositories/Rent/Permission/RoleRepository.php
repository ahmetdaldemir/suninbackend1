<?php namespace App\Repositories\Rent\Permission;

use App\Models\Role;


class RoleRepository implements RoleRepositoryInterface
{

    public function get($id)
    {
        return Role::find($id);
    }

    public function all()
    {
        return Role::all();
    }

    public function delete($id)
    {
        Role::destroy($id);
    }

    public function create(object $data)
    {
        Role::save($data);
    }

    public function update(object $data)
    {
        Role::find($id)->update($data);
    }
}
