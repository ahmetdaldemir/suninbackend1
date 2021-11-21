<?php namespace App\Repositories\Rent\Customer;

interface CustomerRepositoryInterface
{

    public function get($id);

    public function all();

    public function delete($id);

    public function create(object $data);

    public function update(object $data);
}
