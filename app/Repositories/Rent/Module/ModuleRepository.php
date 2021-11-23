<?php namespace App\Repositories\Rent\Module;

use App\Models\Module;


class ModuleRepository implements ModuleRepositoryInterface
{

    public function get($id)
    {
        return Module::find($id);
    }

    public function all()
    {
        return Module::all();
    }

    public function delete($id)
    {
        Module::destroy($id);
    }

    public function create(object $data)
    {
        Module::save($data);
    }

    public function update(object $data)
    {
        Module::find($id)->update($data);
    }
}
