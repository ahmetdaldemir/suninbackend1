<?php namespace App\Models;

class Regulation extends BaseModel
{
    public function get_data()
    {
        return RegulationLanguage::where('regulation_id', $this->id)->get();
    }
}

class RegulationLanguage extends BaseModel
{
    public $timestamps = false;
}
