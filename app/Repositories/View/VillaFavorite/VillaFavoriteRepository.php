<?php namespace App\Repositories\View\VillaFavorite;

use App\Models\VillaFavorite;


class VillaFavoriteRepository implements VillaFavoriteRepositoryInterface
{

    public function get($id)
    {
        return VillaFavorite::find($id);
    }

    public function all()
    {
        return VillaFavorite::all();
    }

    public function delete($id)
    {
        VillaFavorite::destroy($id);
    }

    public function create(object $data)
    {
        VillaFavorite::save($data);
    }

    public function update(object $data)
    {
        VillaFavorite::find($id)->update($data);
    }
}
