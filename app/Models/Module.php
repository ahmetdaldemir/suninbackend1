<?php namespace App\Models;

class Module extends BaseModel
{
}

class RentModule extends BaseModel
{
    protected $table = 'rent_module';
    public $timestamps = false;
    public function get_data()
    {
        return RentLanguage::where('module_id',$this->id)->get();
    }
}

class RentLanguage extends BaseModel
{
    public $timestamps = false;
}
