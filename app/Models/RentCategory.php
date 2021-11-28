<?php namespace App\Models;

class RentCategory extends BaseModel {
    public function get_data()
    {
        return RentCategoryLanguage::where('category_id',$this->id)->get();
    }
}

class RentCategoryLanguage extends BaseModel
{
    public $timestamps = false;

}