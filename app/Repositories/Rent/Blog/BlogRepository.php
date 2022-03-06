<?php namespace App\Repositories\Rent\Blog;

use App\Models\Blog;
use App\Models\BlogLanguage;
use App\Services\Upload;
use Illuminate\Support\Str;

class BlogRepository implements BlogRepositoryInterface
{
    protected $session;
    public function __construct()
    {
        $this->session = session()->get('rent_session');
    }

    public function get($id)
    {
        $data = [];
        $results = Blog::where('id',$id)->get();
        foreach ($results as $result) {
            $data[] = array(
                'id' => $result->id,
                'image' => $result->image,
                'lang' => $result->get_data()
            );
        }
        return $data;
    }

    public function all()
    {
        $session = session()->get('rent_session');
        $data = [];
        $results = Blog::where('tenant_id', "67667cb9-3933-40ab-b248-02a7f819f870")->get();
        foreach ($results as $result) {
            $data[] = array(
                'id' => $result->id,
                'lang' => $result->get_data()
            );
        }
        return $data;
    }

    public function delete($id)
    {
        Blog::destroy($id);
    }

    public function create(object $data)
    {
        $session = session()->get('rent_session');
        $filename = new Upload($data);
        $image = $filename->upload('blog');

        $id = Str::uuid()->toString();
        $result = new Blog();
        $result->id = $id;
        $result->image = 'blog/'.$image;
        $result->tenant_id = "67667cb9-3933-40ab-b248-02a7f819f870";
        $result->save();

        foreach ($data->title as $key => $value) {
            $servicelanguage = new BlogLanguage();
            $servicelanguage->id = Str::uuid()->toString();
            $servicelanguage->blog_id = $id;
            $servicelanguage->title = $value;
            $servicelanguage->language_id = $key;
            $servicelanguage->slug=Str::slug($value);
            $servicelanguage->description = $data->description[$key];
            $servicelanguage->save();
        }
        return redirect()->back();
    }

    public function update(object $data)
    {
        if(!empty($data->photos)){
            $filename = new Upload($data);
            $image = 'blog/'.$filename->upload('blog');
        }else{
            $image = $data->image;
        }

        $blog = Blog::find($data->blog_id);
        $blog->image = $image;
        $blog->save();

        BlogLanguage::where('blog_id', $data->blog_id)->delete();
        foreach ($data->title as $key => $value) {
            $servicelanguage = new BlogLanguage();
            $servicelanguage->id = Str::uuid()->toString();
            $servicelanguage->blog_id = $data->blog_id;
            $servicelanguage->title = $value;
            $servicelanguage->language_id = $key;
            $servicelanguage->slug=Str::slug($value);
            $servicelanguage->description = $data->description[$key];
            $servicelanguage->save();
        }
    }
}
