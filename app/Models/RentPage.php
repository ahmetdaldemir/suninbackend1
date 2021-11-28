<?php namespace App\Models;

class RentPage extends BaseModel {
    public function get_data()
    {
        return RentPageLanguage::where('rent_page_id',$this->id)->get();
    }
}
class RentPageLanguage extends BaseModel { }
