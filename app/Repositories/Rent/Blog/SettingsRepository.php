<?php namespace App\Repositories\Rent\Settings;

use App\Models\Setting;
use App\Models\BlogLanguage;
use App\Services\Upload;
use Illuminate\Support\Str;

class SettingsRepository implements SettingsRepositoryInterface
{
    protected $session;
    public function __construct()
    {
        $this->session = session()->get('rent_session');
    }

    public function get($id)
    {
        $data = [];
        $results = Setting::where('id',$id)->get();
        foreach ($results as $service) {
            $data[] = array(
                'id' => $service->id,
                'image' => $service->image,
                'lang' => $service->get_data()
            );
        }
        return $data;
    }

    public function all()
    {
        $session = session()->get('rent_session');
        $data = [];
        $results = Setting::where('tenant_id', $session['tenant_id'])->get();
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
        Setting::destroy($id);
    }

    public function create(object $data)
    {
        $session = session()->get('rent_session');
        $filename = new Upload($data);
        $image = $filename->upload('blog');

        $id = Str::uuid()->toString();
        $result = new Blog();
        $result->id = $id;
        $result->image = $image;
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
            $image = $filename->upload('blog');
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
