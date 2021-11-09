<?php namespace App\Repositories\Property;

interface PropertyRepositoryInterface
{
    public function get($id);

    public function all();

    public function create(object $data);

    public function delete($id);

    public function update(object $data);
}
