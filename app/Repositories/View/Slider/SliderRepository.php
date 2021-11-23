<?php namespace App\Repositories\View\Slider;

use App\Models\Slider;
use App\Repositories\BaseRepository;

class SliderRepository extends BaseRepository implements SliderRepositoryInterface
{
    public function get($id)
    {
        $data = [];
        $result = Slider::find($id);
        foreach ($result as $slider) {
            $data[] = array(
                'id' => $slider->id,
                'category' => $slider,
                'lang' => $slider->get_data()
            );
        }
        return $data;
    }

    public function all()
    {
        $data = [];
        $result = Slider::where('tenant_id', $this->view_tenant_id)->get();
        foreach ($result as $slider) {
            $data[] = array(
                'id' => $slider->id,
                'slider' => $slider,
                'lang' => $slider->get_data()
            );
        }
        return $data;
    }


}
