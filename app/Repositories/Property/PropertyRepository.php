<?php namespace App\Repositories\Property;

use App\Models\Language;
use App\Models\Property;
use App\Models\PropertyLanguage;
use Illuminate\Support\Str;


class PropertyRepository implements PropertyRepositoryInterface
{

    public function get($id)
    {
        $data['property'] = Property::find($id);
        $data['propertylanguage'] = PropertyLanguage::where('property_id', $id)->get();
        return $data;
    }

    public function create(object $request)
    {
        //        $upload = new Upload($request);
        $id = Str::uuid()->toString();
        $upload = "test";
        $property = new Property();
        $property->id = $id;
        $property->image = $upload;
        $property->save();

        $languages = new Language();

        $i = 0;
        foreach ($request->property as $key => $value) {
            $propertylanguage = new PropertyLanguage();
            $propertylanguage->id = Str::uuid()->toString();
            $propertylanguage->property_id = $id;
            $propertylanguage->lang_id = $key;
            $propertylanguage->slug = Str::of($value)->snake();;
            $propertylanguage->title = $value;
            $propertylanguage->save();
            $i++;
        }
    }

    public function all()
    {
        $data = [];
        $propertys = Property::all();

        foreach ($propertys as $property) {
            $data[] = array(
                'id' => $property->id,
                'lang' => $property->get_data()
            );
        }
        return $data;
    }

    public function delete($id)
    {
        Property::destroy($id);
        $propertylanguage = PropertyLanguage::where('property_id', $id)->delete();
    }

    public function update(object $request)
    {
        //        $upload = new Upload($request);
        $upload = "test";
        $property = Property::find($request->property_id);
        $property->image = $upload;
        $property->save();


        $languages = new Language();
        PropertyLanguage::where('property_id', $request->property_id)->delete();
        $i = 0;
        foreach ($request->property as $key => $value) {
            $propertylanguage = new PropertyLanguage();
            $propertylanguage->id = Str::uuid()->toString();
            $propertylanguage->property_id = $request->property_id;
            $propertylanguage->lang_id = $key;
            $propertylanguage->slug = Str::of($value)->snake();
            $propertylanguage->title = $value;
            $propertylanguage->save();
            $i++;
        }

    }
}
