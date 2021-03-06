<?php namespace App\Repositories\View\Villa;

interface VillaRepositoryInterface
{

    public function get($id);

    public function getslug($id);

    public function select($id);

    public function all();
    public function like(object $data);
    public function fav(object $data);

    public function delete($id);

    public function search(object $data);

    public function create(object $data);

    public function update(object $data);
}
