<?php namespace App\Repositories\Rent\Currency;

use App\Models\Currency;


class CurrencyRepository implements CurrencyRepositoryInterface
{

    public function get($id)
    {
        return Currency::find($id);
    }

    public function all()
    {
        return Currency::all();
    }

    public function delete($id)
    {
        Currency::destroy($id);
    }

    public function create(object $data)
    {
        Currency::save($data);
    }

    public function update(object $data)
    {
        Currency::find($id)->update($data);
    }
}
