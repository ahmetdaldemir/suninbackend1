<?php namespace App\Repositories\View\Customer;

interface CustomerRepositoryInterface
{

    public function get($id);

    public function all();

    public function create(object $data);

    public function update(object $data);

    public function login(object $data);
    public function logout();
}
