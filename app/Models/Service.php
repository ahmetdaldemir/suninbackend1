<?php namespace App\Models;



class Service extends BaseModel
{
    public function get_data()
    {
        return ServiceLanguage::where('service_id', $this->id)->get();
    }
}

class ServiceLanguage extends BaseModel
{
    public $timestamps = false;
}
