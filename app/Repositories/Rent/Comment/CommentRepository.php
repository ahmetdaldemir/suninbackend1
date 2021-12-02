<?php namespace App\Repositories\Rent\Comment;

use App\Models\Villa;
use App\Models\VillaComment;
use App\Services\Upload;
use Illuminate\Support\Str;

class CommentRepository implements CommentRepositoryInterface
{
    public function get($id)
    {
        $data = VillaComment::where('id',$id)->get();
        return $data;
    }

    public function all()
    {
        Villa::all();
        $data = VillaComment::all();
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
        $result->tenant_id = $session['tenant_id'];
        $result->save();

        foreach ($data->title as $key => $value) {
            $servicelanguage = new BlogLanguage();
            $servicelanguage->id = Str::uuid()->toString();
            $servicelanguage->blog_id = $id;
            $servicelanguage->title = $value;
            $servicelanguage->language_id = $key;
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
            $servicelanguage->description = $data->description[$key];
            $servicelanguage->save();
        }
    }
}
