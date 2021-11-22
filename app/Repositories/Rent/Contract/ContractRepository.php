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
        $result = Contract::find($data->id);
        $result->startDate = $data->startDate;
        $result->finishDate = $data->finishDate;
        $result->currency = $data->currency;
        $result->price = $data->price;
        $result->commission = $data->commission;
        $result->discount = $data->discount;
        $result->is_active = $data->is_active;
        $result->save();
    }

    public function copy(object $data)
    {
        $post = Contract::find($data->id);
        $id = Str::uuid()->toString();
        Contract::insertGetId([
            "id" => $id,
            "startDate" => $post->startDate,
            "finishDate" => $post->finishDate,
            "currency" => $post->currency,
            "price" => $post->price,
            "commission" => $post->commission,
            "discount" => $post->discount,
            "is_active" => $post->is_active,
            "villa_id" => $post->villa_id,
            "tenant_id" => $post->tenant_id
        ]);
        return $id;
    }
}
