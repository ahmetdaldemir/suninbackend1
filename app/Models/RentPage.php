<?php namespace App\Models;

class RentPage extends BaseModel {
    public function get_data()
    {
        return RentPageLanguage::where('rent_page_id',$this->id)->get();
    }
    public function get_pages()
    {
        return $this->belongsTo(RentPageLanguage::class,'rent_page_id','deleted_at');
    }
}
class RentPageLanguage extends BaseModel { }
