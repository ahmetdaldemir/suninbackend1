<?php namespace App\Repositories\View\RentCategory;

interface RentCategoryRepositoryInterface
{

    public function get($id);

    public function all();

    public function getslug($slug);
}
