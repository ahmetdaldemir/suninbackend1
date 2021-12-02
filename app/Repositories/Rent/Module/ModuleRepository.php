<?php namespace App\Repositories\Rent\Module;

use App\Models\Module;
use App\Models\RentLanguage;
use App\Models\RentModule;
use Illuminate\Support\Str;

class ModuleRepository implements ModuleRepositoryInterface
{
    public function get($id)
    {
        Module::all();
        $data = [];
        $results = RentModule::where('id',$id)->get();
        foreach ($results as $result) {
            $data[] = array(
                'id' => $result->id,
                'module_id' => $result->module_id,
                'name' => $result->name,
                'class' => $result->class,
                'content' => $result->content,
                'type' => $result->type,
                'status' => $result->status,
                'lang' => $result->get_data()
            );
        }
        return $data[0];
    }

    public function all()
    {
        $module_data = array();
        $session = session()->get('rent_session');
        $modules = Module::all();
        $rentmodules = RentModule::where('tenant_id',$session['tenant_id'])->get();

        foreach ($rentmodules as $rentmodule) {
            $module_data[$rentmodule['module_id']] = array(
                'id' => $rentmodule['id'],
                'module_id' => $rentmodule['module_id'],
                'type' => $rentmodule['type'],
                'class' => $rentmodule['class'],
                'status' => $rentmodule['status'],
                'name' => $rentmodule['name']
            );
        }

        foreach ($modules as $module){
            $data['extension'][] = array(
                'id' => $module['id'],
                'name' => $module['module'],
                'module' => @$module_data[$module['id']]
            );
        }
        //dd($data);
        return $data;
    }

    public function delete($id)
    {
        Module::all();
        RentModule::destroy($id);
    }

    public function create(object $data)
    {
        $session = session()->get('rent_session');
        $module = Module::where('id',$data->id)->get();
        //dd($module);
        $id = Str::uuid()->toString();
        $save = new RentModule();
        $save->id = $id;
        $save->module_id = $module[0]->id; //text
        $save->name = $module[0]->module; //text
        $save->class = $module[0]->class; //text
        $save->content = ''; //text
        $save->type = $module[0]->type; //text
        $save->status = 0; //text
        $save->tenant_id = $session['tenant_id']; //char(36)
        $save->save();
    }

    public function update(object $data)
    {
        Module::all();
        $content = json_encode($data->module);
        $save = RentModule::find($data->id);
        $save->content = $content; //text
        $save->status = $data->status; //text
        $save->save();

        if(!empty($data->title)){
            RentLanguage::where('module_id', $data->id)->delete();
            foreach ($data->title as $key => $value) {
                $record = new RentLanguage();
                $record->id = Str::uuid()->toString();
                $record->module_id = $data->id;
                $record->name = $value;
                $record->slug = $value;
                $record->lang_id = $key;
                $record->description = @$data->description[$key];
                $record->save();
            }
        }
    }

}
