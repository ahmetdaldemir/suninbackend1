<?php

namespace App\Models;

class Property extends BaseModel
{

    public function property_language()
    {
        return $this->belongsTo(PropertyLanguage::class,'property_id','id');
    }

    public function get_data()
    {
       return PropertyLanguage::where('property_id',$this->id)->get();
    }
}

class PropertyLanguage extends BaseModel
{
    public $timestamps = false;
}