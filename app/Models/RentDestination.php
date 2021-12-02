<?php namespace App\Models;

class RentDestination extends BaseModel {
    public function get_data()
    {
        return RentDestinationLanguage::where('rent_destination_id',$this->id)->get();
    }
}

class RentDestinationLanguage extends BaseModel
{
    public $timestamps = false;

}