<?php namespace App\Repositories\Rent\Contract;

use App\Models\Contract;


class ContractRepository implements ContractRepositoryInterface
{

    public function get($id)
    {
        return Contract::find($id);
    }

    public function all()
    {
        return Contract::all();
    }

    public function delete($id)
    {
        Contract::destroy($id);
    }

    public function create(object $data)
    {
        Contract::save($data);
    }

    public function update(object $data)
    {
        Contract::find($id)->update($data);
    }
}
