<?php namespace App\Repositories\Service;

use App\Models\Service;
use App\Models\ServiceLanguage;
use Illuminate\Support\Str;


class ServiceRepository implements ServiceRepositoryInterface
{

    public function get($id)
    {
        $data = [];
        $services = Service::find($id);
        foreach ($services as $service) {
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
        $services = Service::all();
        foreach ($services as $service) {
            $data[] = array(
                'id' => $service->id,
                'lang' => $service->get_data()
            );
        }
        return $data;
    }

    public function delete($id)
    {
        Service::destroy($id);
    }

    public function create(object $data)
    {
        //        $upload = new Upload($request);
        $id = Str::uuid()->toString();
        $service = new Service();
        $service->id = $id;
        $service->save();


        foreach ($data->service as $key => $value) {
            $servicelanguage = new ServiceLanguage();
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
        $service = Service::find($data->id);
        $x = ServiceLanguage::where('service_id', $data->id)->delete();
        foreach ($data->service as $key => $value) {
            $servicelanguage = new ServiceLanguage();
            $servicelanguage->id = Str::uuid()->toString();
            $servicelanguage->title = $value;
            $servicelanguage->service_id = $data->id;
            $servicelanguage->lang_id = $key;
            $servicelanguage->description = $data->service_description[$key];
            $servicelanguage->save();
        }
    }
}
