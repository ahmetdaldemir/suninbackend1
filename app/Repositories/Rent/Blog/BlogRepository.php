<?php namespace App\Repositories\Rent\Blog;

use App\Models\Blog;
use App\Models\BlogLanguage;
use Illuminate\Support\Str;

class BlogRepository implements BlogRepositoryInterface
{
    public function get($id)
    {
        $data = [];
        $services = Blog::find($id);
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
        $session = session()->get('rent_session');
        $data = [];
        $villas = Blog::where('owner_id',$session['tenant_id'])->get();
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
        Blog::destroy($id);
    }

    public function create(object $data)
    {
        //        $upload = new Upload($request);dd($data);
        $id = Str::uuid()->toString();
        $service = new Blog();
        $service->id = $id;
        $service->save();


        foreach ($data->service as $key => $value) {
            $servicelanguage = new BlogLanguage();
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
    }
}
