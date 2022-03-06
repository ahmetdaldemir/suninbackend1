<?php namespace App\Repositories\Rent\Settings;

use App\Models\Setting;
use App\Services\Upload;
use Illuminate\Support\Str;

class SettingsRepository implements SettingsRepositoryInterface
{
    protected $session;
    public function __construct()
    {
        $this->session = session()->get('rent_session');
    }

    public function get()
    {
        $session = session()->get('rent_session');
        $data = Setting::where('tenant_id', "67667cb9-3933-40ab-b248-02a7f819f870")->first();
        if(empty($data['id'])){
            $setting = new Setting();
            $setting->id = Str::uuid()->toString();
            $setting->logo = '';
            $setting->favicon = '';
            $setting->phone = '';
            $setting->whatsapp = '';
            $setting->facebook = '';
            $setting->twitter = '';
            $setting->instagram = '';
            $setting->email = '';
            $setting->chatscript = '';
            $setting->google_tag_manager = '';
            $setting->google_analytics = '';
            $setting->languages = '';
            $setting->tenant_id = "67667cb9-3933-40ab-b248-02a7f819f870";
            $setting->save();
            $data = Setting::where('tenant_id', "67667cb9-3933-40ab-b248-02a7f819f870")->first();
        }
        return $data;
    }

    public function all()
    {
        $session = session()->get('rent_session');
        $data = [];
        $results = Setting::where('tenant_id', "67667cb9-3933-40ab-b248-02a7f819f870")->get();
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
        $result->tenant_id = "67667cb9-3933-40ab-b248-02a7f819f870";
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
        $session = session()->get('rent_session');
        if(!empty($data->logo_file)){
            $filename = new Upload($data);
            $logo_image = 'global/'.$filename->uploads('global','logo_file');
        }else{
            $logo_image = $data->logo_image;
        }

        if(!empty($data->favicon_file)){
            $filename = new Upload($data);
            $favicon = $filename->uploads('global','favicon_file');
        }else{
            $favicon = 'global/'. $data->favicon_image;
        }
        $setting = Setting::where('tenant_id', "67667cb9-3933-40ab-b248-02a7f819f870")->first();
        $setting->logo = $logo_image;
        $setting->favicon = @$favicon;
        $setting->phone = @$data->phone;
        $setting->whatsapp = @$data->whatsapp;
        $setting->instagram = @$data->instagram;
        $setting->facebook = @$data->facebook;
        $setting->twitter = @$data->twitter;
        $setting->email = @$data->email;
        $setting->chatscript = @$data->chatscript;
        $setting->google_tag_manager = @$data->google_tag_manager;
        $setting->google_analytics = @$data->google_analytics;
        $setting->languages = json_encode($data->language);
        $setting->save();
    }
}
