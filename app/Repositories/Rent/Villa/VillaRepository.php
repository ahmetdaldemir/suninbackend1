<?php namespace App\Repositories\Rent\Villa;

use App\Models\Villa;
use App\Models\VillaCategory;
use App\Models\VillaImage as images;
use App\Models\VillaLanguage;
use App\Models\VillaProperty;
use App\Models\VillaRegulation;
use App\Models\VillaService;
use Illuminate\Support\Str;

class VillaRepository implements VillaRepositoryInterface
{
    public function get($id)
    {
        $data = [];
        $results = Villa::where('id',$id)->get();
        foreach ($results as $result) {
            $data[] = array(
                'id' => $result->id,
                'lang' => $result->get_data(),
                'category' => $result->get_category(),
                'service' => $result->get_service(),
                'regulation' => $result->get_regulation(),
                'property' => $result->get_property()
            );
        }
        return $data;
    }

    public function all()
    {
        $session = session()->get('rent_session');
        $data = [];
        $villas = Villa::where('owner_id',$session['tenant_id'])->get();
        foreach ($villas as $villa) {
            $data[] = array(
                'id' => $villa->id,
                'type' => $villa->type,
                'rooms' => $villa->rooms,
                'pool' => $villa->pool,
                'deposit' => $villa->deposit,
                'clean_price' => $villa->clean_price,
                'lang' => $villa->get_data()
            );
        }
        return $data;
    }

    public function delete($id)
    {
        Villa::destroy($id);
    }

    public function create(object $data)
    {
          $filenames = [];
         $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx'];
        $files = $data->file('photos');
        if($files){
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                $filenames[] = $file->store('photos');
            }
        }
        //        $upload = new Upload($request);
        $session = session()->get('rent_session');
        $id = Str::uuid()->toString();
        $villa = new Villa();
        $villa->id = $id;
        $villa->code = "CODE".rand(111,9999);
        $villa->type = $data->type; //varchar(255)
        $villa->capacity = $data->capacity; //varchar(255)
        $villa->rooms = $data->rooms; //varchar(255)
        $villa->pool = $data->pool; //varchar(255)
        $villa->bathrooms = $data->bathrooms; //varchar(255)
        $villa->bedrooms = $data->bedrooms; //varchar(255)
        $villa->clean_price = 500; //double(10, 2
        $villa->deposit = 15; //double(10, 2
        $villa->address = $data->address; //text
        $villa->map = $data->map; //text
        $villa->central_distance = $data->central_distance; //varchar(255)
        $villa->restaurant_distance = $data->restaurant_distance; //varchar(255)
        $villa->plaj_distance = $data->plaj_distance; //varchar(255)
        $villa->hospital_distance = $data->hospital_distance; //varchar(255)
        $villa->market_distance = $data->market_distance; //varchar(255)
        $villa->bus_station_distance = $data->bus_station_distance; //varchar(255)
        $villa->airport_distance = $data->airport_distance; //varchar(255)
        $villa->i_cal = $data->type; //varchar(255)
        $villa->destination_id = $data->destination_id; //char(36)
        $villa->tenant_id = $data->tenant_id; //char(36)
        $villa->owner_id = $session['tenant_id']; //char(36)
        $villa->video = $data->video;
        $villa->save();

        //VillaLanguage::where('villa_id', $id)->delete();
        foreach ($data->title as $key => $value) {
            $record = new VillaLanguage();
            $record->id = Str::uuid()->toString();
            $record->villa_id = $id;
            $record->title = $value;
            $record->seo = $value;
            $record->lang_id = $key;
            $record->description = $data->description[$key];
            $record->save();
        }

        foreach ($data->categories as $key => $value) {
            $record = new VillaCategory();
            $record->id = Str::uuid()->toString();
            $record->category_id = $value;
            $record->villa_id = $id;
            $record->save();
        }

        foreach ($data->services as $key => $value) {
            $record = new VillaService();
            $record->id = Str::uuid()->toString();
            $record->service_id = $value;
            $record->villa_id = $id;
            $record->save();
        }

        foreach ($data->properties as $key => $value) {
            $record = new VillaProperty();
            $record->id = Str::uuid()->toString();
            $record->property_id = $value;
            $record->villa_id = $id;
            $record->save();
        }

        foreach ($data->regulation as $key => $value) {
            $record = new VillaRegulation();
            $record->id = Str::uuid()->toString();
            $record->regulation_id = $value;
            $record->villa_id = $id;
            $record->save();
        }

        if(count($filenames) > 0){
            foreach ($filenames as $item) {
                $villa_images_id = Str::uuid()->toString();
                $villa_image = new VillaImage();
                $villa_image->id = $villa_images_id;
                $villa_image->villa_id = $id;
                $villa_image->image = $item;
                $villa_image->save();
            }
        }
    }

    public function update(object $data)
    {
        $session = session()->get('rent_session');


        $filenames = [];
        $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx'];
        $files = $data->file('photos');
        if($files){
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                $filenames[] = $file->store('photos');
            }
        }


        $service = Villa::find($data->service_id);
        $x = VillaLanguage::where('service_id', $data->service_id)->delete();
        foreach ($data->service as $key => $value) {
            $servicelanguage = new VillaLanguage();
            $servicelanguage->id = Str::uuid()->toString();
            $servicelanguage->title = $value;
            $servicelanguage->service_id = $data->service_id;
            $servicelanguage->lang_id = $key;
            $servicelanguage->description = $data->service_description[$key];
            $servicelanguage->save();
        }
        $id = $data->villa_id;
        $villa = Villa::find($id);
        $villa->type = $data->type; //varchar(255)
        $villa->capacity = $data->capacity; //varchar(255)
        $villa->rooms = $data->rooms; //varchar(255)
        $villa->pool = $data->pool; //varchar(255)
        $villa->bathrooms = $data->bathrooms; //varchar(255)
        $villa->bedrooms = $data->bedrooms; //varchar(255)
        $villa->clean_price = 500; //double(10, 2
        $villa->deposit = 15; //double(10, 2
        $villa->address = $data->address; //text
        $villa->map = $data->map; //text
        $villa->central_distance = $data->central_distance; //varchar(255)
        $villa->restaurant_distance = $data->restaurant_distance; //varchar(255)
        $villa->plaj_distance = $data->plaj_distance; //varchar(255)
        $villa->hospital_distance = $data->hospital_distance; //varchar(255)
        $villa->market_distance = $data->market_distance; //varchar(255)
        $villa->bus_station_distance = $data->bus_station_distance; //varchar(255)
        $villa->airport_distance = $data->airport_distance; //varchar(255)
        $villa->i_cal = $data->type; //varchar(255)
        $villa->destination_id = $data->destination_id; //char(36)
        $villa->tenant_id = $session['tenant_id']; //char(36)
        $villa->owner_id = $data->owner_id; //char(36)
        $villa->save();

        VillaLanguage::where('villa_id', $data->villa_id)->delete();
        VillaCategory::where('villa_id', $data->villa_id)->delete();
        VillaService::where('villa_id', $data->villa_id)->delete();
        VillaProperty::where('villa_id', $data->villa_id)->delete();
        VillaRegulation::where('villa_id', $data->villa_id)->delete();
        VillaImage::where('villa_id', $data->villa_id)->delete();
        foreach ($data->title as $key => $value) {
            $record = new VillaLanguage();
            $record->id = Str::uuid()->toString();
            $record->villa_id = $id;
            $record->title = $value;
            $record->seo = $value;
            $record->lang_id = $key;
            $record->description = $data->description[$key];
            $record->save();
        }

        foreach ($data->categories as $key => $value) {
            $record = new VillaCategory();
            $record->id = Str::uuid()->toString();
            $record->category_id = $value;
            $record->villa_id = $id;
            $record->save();
        }

        foreach ($data->services as $key => $value) {
            $record = new VillaService();
            $record->id = Str::uuid()->toString();
            $record->service_id = $value;
            $record->villa_id = $id;
            $record->save();
        }

        foreach ($data->properties as $key => $value) {
            $record = new VillaProperty();
            $record->id = Str::uuid()->toString();
            $record->property_id = $value;
            $record->villa_id = $id;
            $record->save();
        }

        foreach ($data->regulation as $key => $value) {
            $record = new VillaRegulation();
            $record->id = Str::uuid()->toString();
            $record->regulation_id = $value;
            $record->villa_id = $id;
            $record->save();
        }

        if(count($filenames) > 0){
            foreach ($filenames as $item) {
                $villa_image = new VillaImage();
                $villa_image->id = $villa_images_id;
                $villa_image->villa_id = $id;
                $villa_image->image = $item;
                $villa_image->save();
            }
        }
    }

    public function images($id)
    {
        return images::where('villa_id',$id)->get();
    }

}
