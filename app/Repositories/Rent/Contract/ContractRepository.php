<?php namespace App\Repositories\Rent\Contract;

use App\Models\VillaContract;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;


class ContractRepository implements ContractRepositoryInterface
{

    public function get($id)
    {
        return VillaContract::find($id);
    }

    public function all($id)
    {
        return VillaContract::where('villa_id',$id)->get();
    }

    public function delete($id)
    {
        VillaContract::destroy($id);
    }

    public function create(object $data)
    {
        $session = session()->get('rent_session');
        $id = Str::uuid()->toString();
        $result = new VillaContract();
        $result->id = $id;
        $result->startDate = Carbon::parse($data->startDate)->format('Y-m-d');
        $result->finishDate = Carbon::parse($data->finishDate)->format('Y-m-d');
        $result->currency = $data->currency;
        $result->price = $data->price;
        $result->commission = $data->commission;
        $result->deposit = $data->deposit;
        $result->discount_type = $data->discount_type;
        $result->discount = $data->discount;
        $result->minday = $data->minday;
        $result->is_active = $data->is_active;
        $result->villa_id = $data->villa_id;
        $result->tenant_id = "67667cb9-3933-40ab-b248-02a7f819f870";
        $result->save();
        return $result->id;
    }

    public function update(object $data)
    {
        if($data->startDate != null)
        {
            $result = VillaContract::find($data->id);
            $result->startDate = Carbon::parse($data->startDate)->format('Y-m-d');
            $result->finishDate = Carbon::parse($data->finishDate)->format('Y-m-d');
            $result->currency = $data->currency;
            $result->price = $data->price;
            $result->commission = $data->commission;
            $result->deposit = $data->deposit;
            $result->discount_type = $data->discount_type;
            $result->discount = $data->discount;
            $result->minday = $data->minday;
            $result->is_active = $data->is_active;
            $result->save();
        }

    }

    public function copy(object $data)
    {
        $post = VillaContract::find($data->id);
        $id = Str::uuid()->toString();
        VillaContract::insertGetId([
            "id" => $id,
            "startDate" => $post->startDate,
            "finishDate" => $post->finishDate,
            "currency" => $post->currency,
            "price" => $post->price,
            "commission" => $post->commission,
            "deposit" => $post->deposit,
            "discount_type" => $post->discount_type,
            "discount" => $post->discount,
            "minday" => $post->minday,
            "is_active" => $post->is_active,
            "villa_id" => $post->villa_id,
            "tenant_id" => $post->tenant_id
        ]);
        return $id;
    }
}
