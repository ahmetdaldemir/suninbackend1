<?php namespace App\Repositories\Villa;

use App\Models\Villa;
use App\Models\VillaLanguage;
use Illuminate\Support\Str;


class VillaRepository implements VillaRepositoryInterface
{

    public function get($id)
    {
        $data = [];
        $villa = Villa::find($id);
        foreach ($villa as $service) {
            $data[] = array(
                'id' => $service->id,
                'lang' => $service->get_data()
            );
        }

        return $data;
    }

    public function all()
    {
        $data = [];
        $villa = Villa::where('tenant_id',$tenant_id)->get();
        foreach ($villa as $service) {
            $data[] = array(
                'id' => $service->id,
                'lang' => $service->get_data()
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
        //        $upload = new Upload($request);
        $id = Str::uuid()->toString();
        $service = new Villa();
        $service->id = $id;
        $service->save();


        foreach ($data->service as $key => $value) {
            $servicelanguage = new VillaLanguage();
            $servicelanguage->id = Str::uuid()->toString();
            $servicelanguage->service_id = $id;
            $servicelanguage->title = $value;
            $servicelanguage->lang_id = $key;
            $servicelanguage->description = $data->service_description[$key];
            $servicelanguage->save();
        }
    }

    public function update(object $data)
    {
        $villa = Villa::find($data->service_id);
        $x = VillaLanguage::where('service_id', $data->service_id)->delete();
        foreach ($data->service as $key => $value) {
            $villalanguage = new VillaLanguage();
            $villalanguage->id = Str::uuid()->toString();
            $villalanguage->title = $value;
            $villalanguage->service_id = $data->service_id;
            $villalanguage->lang_id = $key;
            $villalanguage->description = $data->service_description[$key];
            $villalanguage->save();
        }
    }
}
