<?php namespace App\Repositories\Destination;

use App\Models\Destination;
use App\Models\Language;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class DestinationRepository implements DestinationRepositoryInterface
{

    public function get($id)
    {
        return Destination::find($id);
    }

    public function all()
    {
        return DB::table('destinations as d1')->leftJoin('destinations as d2', 'd1.parent_id', '=', 'd2.id')
            ->where('d1.deleted_at','=',null)
            ->select('d1.*', 'd2.title as parent')
            ->get();
        //return Destination::all();
    }

    public function parent($parent)
    {
        return Destination::where('parent_id',"$parent")->get();
    }

    public function delete($id)
    {
        Destination::destroy($id);
    }

    public function create(object $data)
    {
        $destination = new Destination();
        $destination->id = Str::uuid()->toString();
        $destination->parent_id = $data->parent_id;
        $destination->title = $data->title;
        $destination->save();
    }

    public function update(object $data)
    {
        $destination = Destination::find($data->id);
        $destination->id =  $data->id;
        $destination->parent_id = $data->parent_id;
        $destination->title = $data->title;
        $destination->save();
    }
}
