<?php namespace App\Models;

class Villa extends BaseModel
{

    public function get_data()
    {
        return VillaLanguage::where('villa_id',$this->id)->get();
    }

    public function get_comment()
    {
        return VillaComment::where('villa_id',$this->id)->get();
    }

    public function get_category()
    {
        return VillaCategory::where('villa_id',$this->id)->get();
    }

    public function get_service()
    {
        return VillaService::where('villa_id',$this->id)->get();
    }

    public function get_regulation()
    {
        return VillaRegulation::where('villa_id',$this->id)->get();
    }

    public function get_property()
    {
        return VillaProperty::where('villa_id',$this->id)->get();
    }

    public function get_images()
    {
        return VillaImage::where('villa_id',$this->id)->get();
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class, 'destination_id');
    }
    public function default_image()
    {
        $x = VillaImage::where('villa_id',$this->id)->where('is_default',TRUE)->first();
        if($x)
        {
            return $x->image;

        }
    }

    public function images()
    {
        return $this->hasMany(VillaImage::class, 'villa_id','id');
    }

}

class VillaProperty extends BaseModel
{
    public $timestamps = false;
}

class VillaCategory extends BaseModel
{
    public $timestamps = false;
}

class VillaLanguage extends BaseModel
{
    public $timestamps = false;
}

class VillaImage extends BaseModel
{
    public $timestamps = false;
}

class VillaService extends BaseModel
{
    public $timestamps = false;
}

class VillaRegulation extends BaseModel
{
    public $timestamps = false;
}

class VillaComment extends BaseModel
{
    public $timestamps = false;
}

class VillaContract extends BaseModel
{
    public $timestamps = false;
}