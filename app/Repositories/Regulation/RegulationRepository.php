<?php namespace App\Repositories\Regulation;

use App\Models\Regulation;
use App\Models\RegulationLanguage;
use Illuminate\Support\Str;


class RegulationRepository implements RegulationRepositoryInterface
{

    public function get($id)
    {
        $data = [];
        $regulations = Regulation::find($id);
        foreach ($regulations as $regulation) {
            $data[] = array(
                'id' => $regulation->id,
                'lang' => $regulation->get_data()
            );
        }

        return $data;
    }

    public function all()
    {
        $data = [];
        $regulations = Regulation::all();
        foreach ($regulations as $regulation) {
            $data[] = array(
                'id' => $regulation->id,
                'lang' => $regulation->get_data()
            );
        }
        return $data;
    }

    public function delete($id)
    {
        Regulation::destroy($id);
    }

    public function create(object $data)
    {
        //        $upload = new Upload($request);
        $id = Str::uuid()->toString();
        $regulation = new Regulation();
        $regulation->id = $id;
        $regulation->save();


        foreach ($data->regulation as $key => $value) {
            $regulationlanguage = new RegulationLanguage();
            $regulationlanguage->id = Str::uuid()->toString();
            $regulationlanguage->regulation_id = $id;
            $regulationlanguage->title = $value;
            $regulationlanguage->lang_id = $key;
            $regulationlanguage->description = $data->regulation_description[$key];
            $regulationlanguage->save();
        }
    }

    public function update(object $data)
    {
        $regulation = Regulation::find($data->id);
        $x = RegulationLanguage::where('regulation_id', $regulation->id)->delete();
        foreach ($data->regulation as $key => $value) {
            $regulationlanguage = new RegulationLanguage();
            $regulationlanguage->id = Str::uuid()->toString();
            $regulationlanguage->title = $value;
            $regulationlanguage->regulation_id = $regulation->id;
            $regulationlanguage->lang_id = $key;
            $regulationlanguage->description = $data->regulation_description[$key];
            $regulationlanguage->save();
        }
    }
}
