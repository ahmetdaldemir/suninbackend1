<?php namespace App\Models;

class Reservation extends BaseModel {
    public function get_status()
    {
        return Statu::where('villa_id',$this->id)->get();
    }

}
