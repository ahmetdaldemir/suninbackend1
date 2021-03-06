<?php namespace App\Repositories\Rent\Contract;

interface ContractRepositoryInterface
{

    public function get($id);

    public function all($id);

    public function delete($id);

    public function create(object $data);

    public function update(object $data);
}
