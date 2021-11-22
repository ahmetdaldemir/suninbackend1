<?php namespace App\Models;

class Slider extends BaseModel
{
    public function get_data()
    {
        return SliderLanguage::where('slider_id',$this->id)->get();
    }
}
class SliderLanguage extends BaseModel
{
    public $timestamps = false;
}
