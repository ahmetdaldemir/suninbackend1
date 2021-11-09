<?php namespace App\Repositories\Service;

use App\Models\Service;


class ServiceRepository implements ServiceRepositoryInterface
{

    public function get($id)
    {
        return Service::find($id);
    }

    public function all()
    {
        return Service::all();
    }

    public function delete($id)
    {
        Service::destroy($id);
    }

    public function create(object $data)
    {
        Service::save($data);
    }

    public function update(object $data)
    {
        Service::find($id)->update($data);
    }
}
