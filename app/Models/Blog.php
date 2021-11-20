<?php namespace App\Models;


class Blog extends BaseModel
{
    public function get_data()
    {
        return BlogLanguage::where('blog_id',$this->id)->get();
    }
}
class BlogLanguage extends BaseModel
{
    public $timestamps = false;
}
class BlogImage extends BaseModel
{
    public $timestamps = false;
}