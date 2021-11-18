<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jamesh\Uuid\HasUuid;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory,HasRoles,HasUuid,SoftDeletes;
    public $incrementing = false;

    public function get_data()
    {
        return BlogLanguage::where('blog_id',$this->id)->get();
    }
}
class BlogLanguage extends Model
{
    use HasFactory;
    public $incrementing = false;
    public $timestamps = false;
}
class BlogImage extends Model
{
    use HasFactory;
    public $incrementing = false;
    public $timestamps = false;
}