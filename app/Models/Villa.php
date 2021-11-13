<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Villa extends Model
{
    use HasFactory,SoftDeletes;

    public function get_data()
    {
        return VillaLanguage::where('villa_id',$this->id)->get();
    }
}

class VillaProperty extends Model
{
    use HasFactory;
    public $timestamps = false;

}


class VillaCategory extends Model
{
    use HasFactory;
    public $timestamps = false;

}

class VillaLanguage extends Model
{
    use HasFactory;
    public $timestamps = false;

}

class VillaImage extends Model
{
    use HasFactory;
    public $timestamps = false;

}

class VillaService extends Model
{
    use HasFactory;
    public $timestamps = false;

}

class VillaRegulation extends Model
{
    use HasFactory;
    public $timestamps = false;

}