<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Villa;
use App\Models\VillaCategory;
use App\Models\VillaImage;
use App\Models\VillaLanguage;
use App\Models\VillaProperty;
use App\Models\VillaRegulation;
use App\Models\VillaService;
use App\Services\ICal;
use App\Services\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VillaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $villa = Villa::all();
        return response()->json($villa, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filenames = [];

        $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx'];
        $files = $request->file('photos');
        foreach ($files as $file) {
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);
            $filenames[] = $file->store('photos');
        }

        $code = 0;
        $languages = new Language();
        $id = Str::uuid()->toString();
        $data = Villa::latest()->first();
        $villa = new Villa();
        $villa->id = $id;
        $villa->code = "CODE".rand(11999,99999999);
        $villa->type = $request->villaType; //varchar(255)
        $villa->capacity = $request->person; //varchar(255)
        $villa->rooms = $request->room; //varchar(255)
        $villa->pool = $request->poolType; //varchar(255)
        $villa->bathrooms = $request->bathroom; //varchar(255)
        $villa->bedrooms = $request->bedroom; //varchar(255)
        $villa->clean_price = 500; //double(10, 2
        $villa->deposit = 15; //double(10, 2
        $villa->address = $request->address; //text
        $villa->map = $request->map; //text
        $villa->central_distance = $request->centralDistance; //varchar(255)
        $villa->restaurant_distance = $request->restaurantDistance; //varchar(255)
        $villa->plaj_distance = $request->plajDistance; //varchar(255)
        $villa->hospital_distance = $request->hospitalDistance; //varchar(255)
        $villa->market_distance = $request->marketDistance; //varchar(255)
        $villa->bus_station_distance = $request->stationDistance; //varchar(255)
        $villa->airport_distance = $request->airportDistance; //varchar(255)
        $villa->i_cal = $request->villaType; //varchar(255)
        $villa->destination_id = $request->destination_id; //char(36)
        $villa->tenant_id = $request->tenant_id; //char(36)
        $villa->owner_id = $request->owner_id; //char(36)
        $villa->save();

        $i = 0;
        foreach ($request->title as $key => $value) {
            $villa_lang_id = Str::uuid()->toString();
            $villa_language = new VillaLanguage();
            $villa_language->id = $villa_lang_id;
            $villa_language->villa_id = $id;
            $villa_language->title = $value;
            $villa_language->lang_id = $key;
            $villa_language->description = $request->description[$key];
            $villa_language->seo = Str::slug($value, '-');
            $villa_language->save();
            $i++;
        }


        foreach ($request->properties as $item) {
            $villa_properties_id = Str::uuid()->toString();
            $villa_properties = new VillaProperty();
            $villa_properties->id = $villa_properties_id;
            $villa_properties->villa_id = $id;
            $villa_properties->property_id = $item;
            $villa_properties->save();
        }


        foreach ($request->categories as $item) {
            $villa_categories_id = Str::uuid()->toString();
            $villa_categories = new VillaCategory();
            $villa_categories->id = $villa_categories_id;
            $villa_categories->villa_id = $id;
            $villa_categories->category_id = $item;
            $villa_categories->save();
        }


        foreach ($request->services as $item) {
            $villa_services_id = Str::uuid()->toString();
            $villa_services = new VillaService();
            $villa_services->id = $villa_services_id;
            $villa_services->villa_id = $id;
            $villa_services->service_id = $item;
            $villa_services->save();
        }

        foreach ($request->regulations as $item) {
            $villa_regulations_id = Str::uuid()->toString();
            $villa_regulations = new VillaRegulation();
            $villa_regulations->id = $villa_regulations_id;
            $villa_regulations->villa_id = $id;
            $villa_regulations->regulation_id = $item;
            $villa_regulations->save();
        }

        if(count($filenames) > 0)
        {
            foreach ($filenames as $item) {
                $villa_images_id = Str::uuid()->toString();
                $villa_image = new VillaImage();
                $villa_image->id = $villa_images_id;
                $villa_image->villa_id = $id;
                $villa_image->image = $item;
                $villa_image->save();
            }
        }

//        $data = Villa::latest()->first();
//        $x = new ICal($data->code);
//        $ical = $x->create();

        return response()->json($villa, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Villa $villa
     * @return \Illuminate\Http\Response
     */
    public
    function show(Villa $villa)
    {
        $villa = Villa::all();
        return response()->json($villa, 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Villa $villa
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
    {
        $data['property'] = Villa::find($id);
        $data['propertylanguage'] = VillaLanguage::where('property_id', $id)->get();
        return response()->json($data, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Villa $villa
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, $id)
    {
        if (!is_null($request->file)) {
            $upload = new Upload($request);
        }
        $villa = Villa::find($id);
        $villa->image = $upload;
        $villa->save();

        $languages = new Language();

        foreach ($languages as $language) {
            $villalanguage = VillaLanguage::where('property_id', $id)->where('lang_id', $language->id)->first();
            $villalanguage->property_id = $language->id;
            $villalanguage->lang_id = $id;
            $villalanguage->slug = Str::of($request->title)->snake();
            $villalanguage->title = $request->title;
            $villalanguage->save();
        }

        return response()->json($villa, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Villa $villa
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        $villa = Villa::find($id);
        $villa->delete();
        $villalanguage = VillaLanguage::where('property_id', $id)->delete();
        return response()->json("Başarılı", 200);

    }

    public function ical()
    {
        $data = Villa::latest()->first();
        $x = new ICal($data->code);
        $ical = $x->create();
        print_r($ical->getContent());

    }
}
