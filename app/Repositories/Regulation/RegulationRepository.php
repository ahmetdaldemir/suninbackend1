<?php namespace App\Repositories\Regulation;

use App\Models\Regulation;


class RegulationRepository implements RegulationRepositoryInterface
{

    public function get($id)
    {
        return Regulation::find($id);
    }

    public function all()
    {
        return Regulation::all();
    }

    public function delete($id)
    {
        Regulation::destroy($id);
    }

    public function create(object $data)
    {
        Regulation::save($data);
    }

    public function update(object $data)
    {
        Regulation::find($id)->update($data);
    }
}
