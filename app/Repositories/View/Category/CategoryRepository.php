<?php namespace App\Repositories\View\Category;

use App\Models\Category;
use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function get($id)
    {
        $data = [];
        $result = Category::find($id);
        foreach ($result as $category) {
            $data[] = array(
                'id' => $category->id,
                'category' => $category,
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
                'category' => $category,
                'lang' => $category->get_data()
            );
        }
        return $data;
    }


}
