<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jamesh\Uuid\HasUuid;
use Spatie\Permission\Traits\HasRoles;

class Blog extends Model
{
    use HasFactory,HasRoles,HasUuid;

    public function get_data()
    {
        return BlogLanguage::where('blog_id',$this->id)->get();
    }
}
class BlogLanguage extends Model
{
    use HasFactory;
    public $timestamps = false;
}
class BlogImage extends Model
{
    use HasFactory;
    public $timestamps = false;
}