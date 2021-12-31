<?php namespace App\Repositories\Category;

use App\Models\Category;
use App\Models\CategoryLanguage;
use Illuminate\Support\Str;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function get($id)
    {
        $data = [];
        $result = Category::find($id);
        foreach ($result as $category) {
            $data[] = array(
                'id' => $category->id,
                'lang' => $category->get_data()
            );
        }
        return $data;
    }

    public function all()
    {
        $data = [];
        $result = Category::all();
        foreach ($result as $category) {
            $data[] = array(
                'id' => $category->id,
                'lang' => $category->get_data()
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


        foreach ($data->title as $key => $value) {
            $resultLanguage = new CategoryLanguage();
            $resultLanguage->id = Str::uuid()->toString();
            $resultLanguage->category_id = $id;
            $resultLanguage->title = $value;
            $resultLanguage->slug = $value;
            $resultLanguage->lang_id = $key;
            $resultLanguage->save();
        }
    }

    public function update(object $data)
    {
        $villa = Category::find($data->category_id);
        $x = CategoryLanguage::where('category_id', $data->category_id)->delete();
        foreach ($data->category as $key => $value) {
            $resultLanguage = new CategoryLanguage();
            $resultLanguage->id = Str::uuid()->toString();
            $resultLanguage->title = $value;
            $resultLanguage->slug = $value;
              $resultLanguage->category_id = $data->category_id;
            $resultLanguage->lang_id = $key;
            $resultLanguage->save();
        }
    }
}
