<?php namespace App\Repositories\View\RentDestination;

interface RentDestinationRepositoryInterface
{

    public function get($id);

    public function all();

    public function search(object $data);

    public function getslug($slug);
}
