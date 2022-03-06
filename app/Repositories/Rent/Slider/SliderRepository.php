<?php namespace App\Repositories\Rent\Slider;

use App\Models\Slider;
use App\Models\SliderLanguage;
use App\Services\Upload;
use Illuminate\Support\Str;

class SliderRepository implements SliderRepositoryInterface
{
    protected $session;
    public function __construct()
    {
        $this->session = session()->get('rent_session');
    }

    public function get($id)
    {
        $data = [];
        $results = Slider::where('id',$id)->get();
        foreach ($results as $result) {
            $data[] = array(
                'id' => $result->id,
                'image' => $result->image,
                'lang' => $result->get_data()
            );
        }
        return $data;
    }

    public function all()
    {
        $session = session()->get('rent_session');
        $data = [];
        $results = Slider::where('tenant_id', "67667cb9-3933-40ab-b248-02a7f819f870")->get();
        foreach ($results as $result) {
            $data[] = array(
                'id' => $result->id,
                'lang' => $result->get_data()
            );
        }
        return $data;
    }

    public function delete($id)
    {
        Slider::destroy($id);
    }

    public function create(object $data)
    {
        $session = session()->get('rent_session');
        $filename = new Upload($data);
        $image = 'slider/'.$filename->upload('slider');

        $id = Str::uuid()->toString();
        $result = new Slider();
        $result->id = $id;
        $result->image = $image;
        $result->status = $data->status;
        $result->tenant_id = "67667cb9-3933-40ab-b248-02a7f819f870";
        $result->save();

        foreach ($data->title as $key => $value) {
            $dataLanguage = new SliderLanguage();
            $dataLanguage->id = Str::uuid()->toString();
            $dataLanguage->slider_id = $id;
            $dataLanguage->title = $value;
            $dataLanguage->language_id = $key;
            $dataLanguage->text1 = $data->text1[$key];
            $dataLanguage->text2 = $data->text2[$key];
            $dataLanguage->text3 = $data->text3[$key];
            $dataLanguage->sub_title =  Str::slug($value);
            $dataLanguage->slug = $data->slug[$key];
            $dataLanguage->save();
        }
        return redirect()->back();
    }

    public function update(object $data)
    {
        if(!empty($data->photos)){
            $filename = new Upload($data);
            $image = 'slider/'.$filename->uploads('blog','photos');
        }else{
            $image = $data->image;
        }
        $result = Slider::find($data->slider_id);
        $result->image = $image;
        $result->save();

        SliderLanguage::where('slider_id', $data->slider_id)->delete();
        foreach ($data->title as $key => $value) {
            $dataLanguage = new SliderLanguage();
            $dataLanguage->id = Str::uuid()->toString();
            $dataLanguage->slider_id = $data->slider_id;
            $dataLanguage->slug = $value;
            $dataLanguage->title = $value;
            $dataLanguage->language_id = $key;
            $dataLanguage->sub_title = $data->sub_title[$key];
            $dataLanguage->save();
        }
    }
}
