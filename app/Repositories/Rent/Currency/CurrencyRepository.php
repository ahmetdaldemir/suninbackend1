<?php namespace App\Repositories\Rent\Currency;

use App\Models\Currency;
use Illuminate\Support\Str;

class CurrencyRepository implements CurrencyRepositoryInterface
{
    protected $session;
    public function __construct()
    {
        $this->session = session()->get('rent_session');
    }

    public function get($id)
    {
        $data = [];
        $results = Currency::where('id',$id)->get();
        foreach ($results as $result) {
            $data[] = array(
                'id' => $result->id,
                'name' => $result->name,
            );
        }
        return $data;
    }

    public function all()
    {
        $data = [];
        $results = Currency::all();
        foreach ($results as $result) {
            $data[] = array(
                'id' => $result->id,
                'name' => $result->name,
            );
        }
        return $data;
    }

    public function delete($id)
    {
        Currency::destroy($id);
    }

    public function create(object $data)
    {
        $session = session()->get('rent_session');
        $id = Str::uuid()->toString();
        $result = new Currency();
        $result->id = $id;
        $result->status = $data->status;
        $result->tenant_id = $session['tenant_id'];
        $result->save();
        return redirect()->back();
    }

    public function update(object $data)
    {
        $result = Currency::find($data->currency_id);
        $result->name = $data->name;
        $result->save();
    }
}
