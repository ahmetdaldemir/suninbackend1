<?php namespace App\Repositories\Rent\RentCategory;

interface RentCategoryRepositoryInterface
{

    public function get($id);

    public function all();

    public function delete($id);

    public function create(object $data);

    public function update(object $data);
}
