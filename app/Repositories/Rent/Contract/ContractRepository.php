<?php namespace App\Repositories\Rent\Contract;

use App\Models\Contract;
use Illuminate\Support\Str;


class ContractRepository implements ContractRepositoryInterface
{

    public function get($id)
    {
        return Contract::find($id);
    }

    public function all($id)
    {
        return Contract::where('villa_id',$id)->get();
    }

    public function delete($id)
    {
        Contract::destroy($id);
    }

    public function create(object $data)
    {
        $session = session()->get('rent_session');
        $id = Str::uuid()->toString();
        $result = new Contract();
        $result->id = $id;
        $result->startDate = $data->startDate;
        $result->finishDate = $data->finishDate;
        $result->currency = $data->currency;
        $result->price = $data->price;
        $result->commission = $data->commission;
        $result->discount = $data->discount;
        $result->is_active = $data->is_active;
        $result->villa_id = $data->villa_id;
        $result->tenant_id = $session['tenant_id'];
        $result->save();
        return $result->id;
    }

    public function update(object $data)
    {
        Contract::find($id)->update($data);
    }
}
