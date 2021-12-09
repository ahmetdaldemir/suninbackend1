<?php namespace App\Repositories\Rent\RentDestination;

use App\Models\Destination;
use App\Models\RentDestination;
use App\Models\RentDestinationLanguage;
use App\Services\Upload;
use Illuminate\Support\Str;

class RentDestinationRepository implements RentDestinationRepositoryInterface
{
    public function get($id)
    {
        Destination::all();
        $data = [];
        $results = RentDestination::where('id',$id)->get();
        foreach ($results as $result) {
            $data[] = array(
                'id' => $result->id,
                'destination_id' => $result->destination_id,
                'image' => $result->image,
                'status' => $result->is_status,
                'lang' => $result->get_data()
            );
        }
        return $data[0];
    }

    public function all()
    {
        $module_data = array();
        $session = session()->get('rent_session');
        $destinations = Destination::all();
        $rentdestinations = RentDestination::where('tenant_id',$session['tenant_id'])->get();
        foreach ($rentdestinations as $rentdestination) {
            $module_data[$rentdestination['destination_id']] = array(
                'id' => $rentdestination['id'],
                'destination_id' => $rentdestination['destination_id'],
                'image' => $rentdestination['image'],
                'is_status' => $rentdestination['is_status'],
                'name' => $rentdestination['name'],
                'lang' => $rentdestination->get_data()
            );
        }

        foreach ($destinations as $destination){
            $data['destinations'][] = array(
                'id' => $destination['id'],
                'name' => $destination['title'],
                'destination' => @$module_data[$destination['id']]
            );
        }
        //dd($data);
        return $data;
    }

    public function delete($id)
    {
        RentDestination::destroy($id);
    }

    public function create(object $data)
    {
        $session = session()->get('rent_session');
        $data = Destination::where('id',$data->id)->get();
        $data['lang'] = $data[0]->get_data();
        $id = Str::uuid()->toString();
        $save = new RentDestination();
        $save->id = $id;
        $save->destination_id = $data[0]->id;
        $save->image = '';
        $save->tenant_id = $session['tenant_id'];
        $save->save();

        foreach ($data['lang'] as $lang) {
            $record = new RentDestinationLanguage();
            $record->id = Str::uuid()->toString();
            $record->rent_destination_id = $id;
            $record->name = $lang['title'];
            $record->slug = Str::slug($lang['slug']);
            $record->lang_id = $lang['lang_id'];
            $record->description = '';
            $record->meta = '';
            $record->tags = '';
            $record->save();
        }
    }

    public function update(object $data)
    {
        Destination::all();
        if(!empty($data->photos)){
            $filename = new Upload($data);
            $image = 'destination/'.$filename->upload('destination');
        }else{
            $image = $data->image;
        }

        $rentdestination = RentDestination::find($data->destination_id);
        $rentdestination->image = $image;
        $rentdestination->save();

        if(!empty($data->title)){
            RentDestinationLanguage::where('rent_destination_id', $data->destination_id)->delete();
            foreach ($data->title as $key => $value) {
                $record = new RentDestinationLanguage();
                $record->id = Str::uuid()->toString();
                $record->rent_destination_id = $data->destination_id;
                $record->name = $value;
                $record->slug = Str::slug($value);
                $record->lang_id = $key;
                $record->description = @$data->description[$key];
                $record->meta = @$data->meta[$key];
                $record->tags = @$data->tags[$key];
                $record->save();
            }
        }
    }
}
