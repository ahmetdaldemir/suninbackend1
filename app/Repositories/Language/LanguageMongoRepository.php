<?php namespace App\Repositories\Language;

use App\Models\Language;
use Illuminate\Support\Str;


class LanguageRepository implements LanguageRepositoryInterface
{

    public function get($id)
    {
        return Language::find($id);
    }

    public function all()
    {
        return Language::all();
    }

    public function delete($id)
    {
        Language::destroy($id);
    }

    public function create(object $data)
    {
        $language = new Language();
        $language->id = Str::uuid()->toString();
        $language->title = $data->title;
        $language->flag = $data->flag;
        $language->code = $data->code;
        $language->save();
    }

    public function update(object $data)
    {
        $language = new Language();
        $language->where('id','=',$data->id)->update([
            'title' => $data->title,
            'code' => $data->code,
            'flag' => $data->flag
        ]);
    }
}
