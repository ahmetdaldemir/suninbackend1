<?php namespace App\Repositories\View\RentDestination;

interface RentDestinationRepositoryInterface
{

    public function get($id);

    public function all();

    public function getslug($slug);
}
