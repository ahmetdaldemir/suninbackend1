<?php namespace App\Models;

class Destination extends BaseModel
{

    public function get_data()
    {
        return DestinationLanguage::where('destination_id',$this->id)->get();
    }

    public function children(){
        return $this->hasMany('App\Models\Destination','parent_id');
    }
}

class DestinationLanguage extends BaseModel
{
    public $timestamps = false;

}