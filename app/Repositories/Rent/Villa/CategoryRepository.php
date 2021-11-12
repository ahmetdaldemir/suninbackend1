<?php namespace App\Repositories\Rent\Villa;

use App\Models\Category;
use App\Models\CategoryLanguage;
use Illuminate\Support\Str;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function get($id)
    {
        $data = [];
        $result = Category::find($id);
        foreach ($result as $service) {
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
        $result = Category::where('tenant_id', $tenant_id)->get();
        foreach ($result as $service) {
            $data[] = array(
                'id' => $service->id,
                'lang' => $service->get_data()
            );
        }
        return $data;
    }

    public function delete($id)
    {
        Category::destroy($id);
    }

    public function create(object $data)
    {
        $id = Str::uuid()->toString();
        $service = new Category();
        $service->id = $id;
        $service->save();


        foreach ($data->service as $key => $value) {
            $resultLanguage = new CategoryLanguage();
            $resultLanguage->id = Str::uuid()->toString();
            $resultLanguage->service_id = $id;
            $resultLanguage->title = $value;
            $resultLanguage->lang_id = $key;
            $resultLanguage->description = $data->service_description[$key];
            $resultLanguage->save();
        }
    }

    public function update(object $data)
    {
        $villa = Category::find($data->service_id);
        $x = CategoryLanguage::where('service_id', $data->service_id)->delete();
        foreach ($data->service as $key => $value) {
            $resultLanguage = new CategoryLanguage();
            $resultLanguage->id = Str::uuid()->toString();
            $resultLanguage->title = $value;
            $resultLanguage->service_id = $data->service_id;
            $resultLanguage->lang_id = $key;
            $resultLanguage->description = $data->service_description[$key];
            $resultLanguage->save();
        }
    }
}
