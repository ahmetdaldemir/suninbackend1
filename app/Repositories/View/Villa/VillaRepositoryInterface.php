<?php namespace App\Repositories\View\Villa;

interface VillaRepositoryInterface
{

    public function get($id);

    public function getseo($id);

    public function all();

    public function delete($id);

    public function create(object $data);

    public function update(object $data);
}
