<?php namespace App\Models;

class Category extends BaseModel
{
    public function get_data()
    {
        return CategoryLanguage::where('category_id',$this->id)->get();
    }
}

class CategoryLanguage extends BaseModel
{
    public $timestamps = false;

}