<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jamesh\Uuid\HasUuid;
use Spatie\Permission\Traits\HasRoles;

class Category extends Model
{
    use HasFactory,SoftDeletes;
    public $incrementing = false;


    public function get_data()
    {
        return CategoryLanguage::where('category_id',$this->id)->get();
    }
}


class CategoryLanguage extends Model
{
    use HasFactory;
    public $incrementing = false;
    public $timestamps = false;

}