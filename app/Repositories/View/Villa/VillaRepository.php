<?php namespace App\Repositories\View\Villa;

use App\Models\Villa;
use App\Models\VillaCategory;
use App\Models\VillaContract;
use App\Models\VillaImage;
use App\Models\VillaLanguage;
use App\Models\VillaProperty;
use App\Models\VillaRegulation;
use App\Models\VillaService;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VillaRepository extends BaseRepository implements VillaRepositoryInterface
{
    public function get($id)
    {
        $data = [];
        $date = date("Y-m-d");
        $result = Villa::where('id', $id)->get();
        $result = $result[0];
        $date = date("Y-m-d");
        $contrat = VillaContract::where('villa_id', $result->id)->where('startDate', '<=', $date)->where('finishDate', '>=', $date)
            ->leftJoin('currencies', 'villa_contracts.currency', '=', 'currencies.id')
            ->get();
        $data = array(
            'id' => $result->id,
            'image' => $result->image,
            'lang' => $result->get_data(),
            'category' => $result->get_category(),
            'services' => $result->get_service(),
            'regulations' => $result->get_regulation(),
            'propertys' => $result->get_property(),
            'images' => $result->get_images(),
            'comments' => $result->get_comment(),
            'price' => $contrat[0]->price,
            'discount_type' => $contrat[0]->discount_type,
            'discount' => $contrat[0]->discount,
            'minday' => $contrat[0]->minday,
            'deposit' => $contrat[0]->deposit,
            'currency' => $contrat[0]->name,
            'currency_id' => $contrat[0]->currency_id,
            'symbol' => $contrat[0]->symbol,
            'villa' => $result
        );
        return $data;
    }

    public function search($search)
    {
        $category = $search['categories'] ? $search['categories'] : array(0);
        $villas = Villa::whereIn('id', $category)->where('owner_id', $this->view_tenant_id)->get();
        //$results = Villa::where('id', $villa->villa_id)->first();
        foreach ($villas as $villa) {
            $contrat = VillaContract::where('villa_id', $villa->id)->where('startDate', '<=', $search['checkin'])->where('finishDate', '>=', $search['checkout'])
                ->leftJoin('currencies', 'villa_contracts.currency', '=', 'currencies.id')
                ->get();
            //dd($contrat[0]->price);
            $data[] = array(
                'id' => $villa->id,
                'villa' => $villa,
                'price' => @$contrat[0]->price . ' ' . @$contrat[0]->symbol,
                'discount' => @$contrat[0]->discount,
                'currency' => @$contrat[0]->name,
                'property' => $villa->get_property(),
                'lang' => $villa->get_data()
            );
        }
        return $data;
    }

    public function getslug($slug)
    {
        $villa = new Villa();
        $villa_language = VillaLanguage::where('slug', $slug)->where('lang_id', $this->lang_id)->first();
        $data = [];
        $result = $villa::where('id', $villa_language->villa_id)->first();
        $date = date("Y-m-d");
        $contrat = VillaContract::where('villa_id', $result->id)->where('startDate', '<=', $date)->where('finishDate', '>=', $date)
            ->leftJoin('currencies', 'villa_contracts.currency', '=', 'currencies.id')
            ->get();
        //dd($contrat);
        $data = array(
            'id' => $result->id,
            'lang' => $result->get_data(),
            'category' => $result->get_category(),
            'services' => $result->get_service(),
            'regulations' => $result->get_regulation(),
            'propertys' => $result->get_property(),
            'images' => $result->get_images(),
            'comments' => $result->get_comment(),
            'price' => $contrat[0]->price . ' ' . $contrat[0]->symbol,
            'discount' => $contrat[0]->discount,
            'currency' => $contrat[0]->name,
            'villa' => $result
        );
        return $data;
    }

    public function all()
    {
        $data = [];
        $date = date("Y-m-d");
        $villas = Villa::where('owner_id', $this->view_tenant_id)->get();
        foreach ($villas as $villa) {
            $contrat = VillaContract::where('villa_id', $villa->id)->where('startDate', '<=', $date)->where('finishDate', '>=', $date)
                ->leftJoin('currencies', 'villa_contracts.currency', '=', 'currencies.id')
                ->get();
            $destina = json_decode($villa->destination_id);
            $dest = DB::select("SELECT d.title as city,
	               (SELECT title FROM destinations WHERE id='".@$destina->state."') as state,
                   (SELECT title FROM destinations WHERE id='".@$destina->region."') as region  
                   FROM destinations as d WHERE d.id='".@$destina->city."'
                  ");
            //dd($dest);


            //dd($contrat[0]->price);
            //$dest = DB::table('')->
            $data[] = array(
                'id' => $villa->id,
                'villa' => $villa,
                'destination' => @$dest[0]->state . '/' . @$dest[0]->region,
                'price' => @$contrat[0]->price . ' ' . @$contrat[0]->symbol,
                'destination_id' => json_decode($villa->destination_id),
                'discount' => @$contrat[0]->discount,
                'currency' => @$contrat[0]->name,
                'property' => $villa->get_property(),
                'lang' => $villa->get_data()
            );
        }
        //dd($data);
        return $data;
    }

    public function select($category)
    {
        $data = [];
        Villa::all();
        $date = date("Y-m-d");
        $villas = DB::select("SELECT * FROM `villa_categories` as c 
                    LEFT JOIN villas as v ON v.id=c.villa_id 
                    /*LEFT JOIN villa_properties as p ON p.villa_id=c.villa_id*/ 
                    /*LEFT JOIN villa_languages as l ON l.villa_id=v.id l.lang_id='".$this->lang_id."' AND*/ 
                    WHERE  c.category_id='".@$category."'");

        //dd($villas);
        foreach ($villas as $villa) {
            $lang = VillaLanguage::where('villa_id', $villa->id)->where('lang_id', $this->lang_id)->get();
            $contrat = VillaContract::where('villa_id', $villa->id)->where('startDate', '<=', $date)->where('finishDate', '>=', $date)
                ->leftJoin('currencies', 'villa_contracts.currency', '=', 'currencies.id')
                ->get();
            $destina = json_decode($villa->destination_id);
            $dest = DB::select("SELECT d.title as city,
	               (SELECT title FROM destinations WHERE id='".@$destina->state."') as state,
                   (SELECT title FROM destinations WHERE id='".@$destina->region."') as region  
                   FROM destinations as d WHERE d.id='".@$destina->city."'
                  ");


            //dd($contrat[0]->price);
            //$dest = DB::table('')->
            $data[] = array(
                'id' => $villa->id,
                'villa' => $villa,
                'lang' => $lang[0],
                'destination' => @$dest[0]->state . '/' . @$dest[0]->region,
                'price' => @$contrat[0]->price . ' ' . @$contrat[0]->symbol,
                'discount' => @$contrat[0]->discount,
                'currency' => @$contrat[0]->name,
                //'property' => $villa->get_property(),
                //'lang' => $villa->get_data()
            );
        }
        //dd($data);
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
            $record->slug = Str::slug($value);
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
            $record->slug = Str::slug($value);
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
