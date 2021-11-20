<?php

namespace App\Models;

class Villa extends BaseModel
{

    public function get_data()
    {
        return VillaLanguage::where('villa_id',$this->id)->get();
    }
    public function get_category()
    {
        return VillaCategory::where('villa_id',$this->id)->get();
    }
    public function get_service()
    {
        return VillaService::where('villa_id',$this->id)->get();
    }
    public function get_regulation()
    {
        return VillaRegulation::where('villa_id',$this->id)->get();
    }
    public function get_property()
    {
        return VillaProperty::where('villa_id',$this->id)->get();
    }
}

class VillaProperty extends BaseModel
{
    public $timestamps = false;
}


class VillaCategory extends BaseModel
{
    public $timestamps = false;
}

class VillaLanguage extends BaseModel
{
    public $timestamps = false;
}

class VillaImage extends BaseModel
{
    public $timestamps = false;
}

class VillaService extends BaseModel
{
    public $timestamps = false;
}

class VillaRegulation extends BaseModel
{
    public $timestamps = false;
}