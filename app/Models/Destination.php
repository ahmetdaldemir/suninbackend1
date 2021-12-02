<?php namespace App\Models;

class Destination extends BaseModel
{
    public function get_data()
    {
        return DestinationLanguage::where('destination_id',$this->id)->get();
    }
}

class DestinationLanguage extends BaseModel
{
    public $timestamps = false;

}