<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use HasFactory,SoftDeletes;
    public $incrementing = false;

    public function property_language()
    {
        return $this->belongsTo(PropertyLanguage::class,'property_id','id');
    }

    public function get_data()
    {
       return PropertyLanguage::where('property_id',$this->id)->get();
    }
}

class PropertyLanguage extends Model
{
    use HasFactory;
    public $incrementing = false;
    public $timestamps = false;

}