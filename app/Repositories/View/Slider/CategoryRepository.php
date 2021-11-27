<?php namespace App\Repositories\View\Slider;

use App\Models\Slider;
use App\Repositories\BaseRepository;

class SliderRepository extends BaseRepository implements SliderRepositoryInterface
{
    public function get($id)
    {
        $data = [];
        $result = Slider::find($id);
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
        $result = Slider::all();
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
