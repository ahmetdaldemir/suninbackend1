<?php namespace App\Repositories\Rent\RentDestination;

use App\Models\Destination;
use App\Models\Language;
use App\Models\RentDestination;
use App\Models\RentDestinationLanguage;
use App\Services\Upload;
use Illuminate\Support\Str;

class RentDestinationRepository implements RentDestinationRepositoryInterface
{


    protected $language_data;
    protected $liste;

    public function __construct()
    {
        $this->language_data = Language::all();
    }

    public function get($id)
    {
        Destination::all();
        $data = [];
        $results = RentDestination::where('id', $id)->get();
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
        $rentdestinations = RentDestination::where('tenant_id', "67667cb9-3933-40ab-b248-02a7f819f870")->get();
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

        foreach ($destinations as $destination) {
            $data['destinations'][] = array(
                'id' => $destination['id'],
                'name' => $destination['title'],
                'destination' => @$module_data[$destination['id']]
            );
        }
        //dd($data);
        return @$data;
    }

    public function delete($id)
    {
        RentDestination::destroy($id);
    }

    public function create(object $data)
    {
        $session = session()->get('rent_session');
        $destinations = Destination::find($data->id);
        $destinationList = $this->addParentMenu($destinations);

        foreach ($this->liste as $item) {


            $save = new RentDestination();
            $id = Str::uuid()->toString();
            $save->id = $id;
            $save->destination_id = $item->id;
            $save->image = '';
            $save->tenant_id = "67667cb9-3933-40ab-b248-02a7f819f870";
            $save->save();

            $newid= $save->id;

            foreach ($this->language_data as $language)
            {
                $record = new RentDestinationLanguage();
                $record->id = Str::uuid()->toString();
                $record->rent_destination_id = $newid;
                $record->name = $item->title;
                $record->slug = Str::slug($item->title);
                $record->lang_id = $language->id;
                $record->description = $item->title;
                $record->meta = $item->title;
                $record->tags = $item->title;
                $record->save();
            }
        }
    }


    public function addParentMenu($destination)
    {
        $this->liste[] = $destination;
        if($destination->parent_id != 0)
        {
            $parent = Destination::find($destination->parent_id);
            $this->addParentMenu($parent);
        }
    }

    public function update(object $data)
    {
        Destination::all();
        if (!empty($data->photos)) {
            $filename = new Upload($data);
            $image = 'destination/' . $filename->upload('destination');
        } else {
            $image = $data->image;
        }

        $rentdestination = RentDestination::find($data->destination_id);
        $rentdestination->image = $image;
        $rentdestination->save();

        if (!empty($data->title)) {
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
