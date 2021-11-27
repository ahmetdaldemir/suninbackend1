<?php namespace App\Repositories\Rent\Permission;



use Spatie\Permission\Models\Permission;

class PermissionRepository implements PermissionRepositoryInterface
{

    public function get($id)
    {
        return Permission::find($id);
    }

    public function all()
    {
        return Permission::all();
    }

    public function delete($id)
    {
        Permission::destroy($id);
    }

    public function create(object $data)
    {
       $permission = new Permission();
       $permission->name = $data->name;
       $permission->guard_name = "web";
       $permission->save();
    }

    public function update(object $data)
    {
        $permission = Permission::find($data->id);
        $permission->name = $data->name;
        $permission->guard_name = "web";
        $permission->save();
    }
}
