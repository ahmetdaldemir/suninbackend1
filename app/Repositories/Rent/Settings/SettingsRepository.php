<?php namespace App\Repositories\Rent\Settings;

use App\Models\Setting;
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
        $data['settings'] = Setting::where('tenant_id', $session['tenant_id'])->get();
        if(Count($data['settings'])<1){
            $setting = new Setting();
            $setting->id = Str::uuid()->toString();
            $setting->logo = '';
            $setting->favicon = '';
            $setting->phone = '';
            $setting->whatsapp = '';
            $setting->email = '';
            $setting->chatscript = '';
            $setting->google_tag_manager = '';
            $setting->google_analytics = '';
            $setting->languages = '';
            $setting->tenant_id = $session['tenant_id'];
            $setting->save();
            $data['settings'] = Setting::where('tenant_id', $session['tenant_id'])->get();
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
        $setting = Setting::find($data->id);
        $setting->logo = $data->logo;
        $setting->favicon = $data->favicon;
        $setting->phone = $data->phone;
        $setting->whatsapp = $data->whatsapp;
        $setting->email = $data->email;
        $setting->chatscript = $data->chatscript;
        $setting->google_tag_manager = $data->google_tag_manager;
        $setting->google_analytics = $data->google_analytics;
        $setting->languages = $data->languages;
        $setting->save();
    }
}
