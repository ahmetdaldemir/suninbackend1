<?php

namespace App\Repositories\Destination;

interface DestinationRepositoryInterface
{

    public function get($id);

    public function all();

    public function parent($parent);

    public function delete($id);

    public function create(object $data);

    public function update(object $data);
}
