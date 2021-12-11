<?php namespace App\Repositories\View\Villa;

use App\Models\Villa;
use App\Models\VillaCategory;
use App\Models\VillaImage;
use App\Models\VillaLanguage;
use App\Models\VillaProperty;
use App\Models\VillaRegulation;
use App\Models\VillaService;
use App\Repositories\BaseRepository;
use Illuminate\Support\Str;

class VillaRepository extends BaseRepository implements VillaRepositoryInterface
{
    public function get($id)
    {
        $data = [];
        $results = Villa::where('id', $id)->get();
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

    public function search($search)
    {
        $villa = Villa::where('name', $search)->where('lang_id', $this->lang_id)->get();
        $results = $villa::where('id', $villa->villa_id)->first();
        foreach ($results as $result){
            $lang = $result->get_data();
            $data = array(
                'id' => $result->id,
                'lang' => $lang['name'],
                'rentdestination' => $result
            );
        }/**/
        $data = Villa::all();
        return $data;
    }

    public function getslug($slug)
    {

        $villa = new Villa();

        $villa_language = VillaLanguage::where('slug', $slug)->where('lang_id', $this->lang_id)->first();

        $data = [];
        $result = $villa::where('id', $villa_language->villa_id)->first();
            $data = array(
                'id' => $result->id,
                'lang' => $result->get_data(),
                'category' => $result->get_category(),
                'services' => $result->get_service(),
                'regulations' => $result->get_regulation(),
                'properties' => $result->get_property(),
                'images' => $result->get_images(),
                'comments' => $result->get_comment(),
                'villa' => $result
            );
        return $data;
    }

    public function all()
    {
        $data = [];
        $villas = Villa::where('owner_id', $this->view_tenant_id)->get();
        foreach ($villas as $villa) {
            $data[] = array(
                'id' => $villa->id,
                'villa' => $villa,
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
        if ($files) {
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
        $villa->code = "CODE" . rand(111, 9999);
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
            $record->slug =  Str::slug($value);
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

        if (count($filenames) > 0) {
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
        $villa = Villa::find($data->villa_id);
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
        $blog->save();

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
            $record->slug =  Str::slug($value);
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

        if (count($filenames) > 0) {
            foreach ($filenames as $item) {
                $villa_image = new VillaImage();
                $villa_image->id = $villa_images_id;
                $villa_image->villa_id = $id;
                $villa_image->image = $item;
                $villa_image->save();
            }
        }
    }
}
