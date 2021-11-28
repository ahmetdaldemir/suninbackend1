<?php namespace App\Repositories\Rent\RentDestination;

use App\Models\Destination;
use App\Models\RentDestination;
use App\Repositories\Rent\RentDestination\RentDestinationRepositoryInterface;
use App\Services\Upload;
use Illuminate\Support\Str;

class RentDestinationRepository implements RentDestinationRepositoryInterface
{
    public function get($id)
    {
        Destination::all();
        $data = [];
        $results = RentDestination::where('id',$id)->get();
        foreach ($results as $result) {
            $data[] = array(
                'id' => $result->id,
                'page_id' => $result->page_id,
                'image' => $result->image,
                'status' => $result->is_status,
                'lang' => $result->get_data()
            );
        }
        return $data[0];
    }

    public function all()
    {
        $module_data = array();
        $session = session()->get('rent_session');
        $pages = Destination::all();
        $rentpages = RentDestination::where('tenant_id',$session['tenant_id'])->get();
        //dd($pages);
        foreach ($rentpages as $rentpage) {
            $page_data[$rentpage['page_id']] = array(
                'id' => $rentpage['id'],
                'page_id' => $rentpage['page_id'],
                'image' => $rentpage['image'],
                'is_status' => $rentpage['is_status'],
                'name' => $rentpage['name']
            );
        }

        foreach ($pages as $page){
            $data['pages'][] = array(
                'id' => $page['id'],
                'name' => $page['name'],
                'page' => @$page_data[$page['id']]
            );
        }
        //dd($data);
        return $data;
    }

    public function delete($id)
    {
        RentDestination::destroy($id);
    }

    public function create(object $data)
    {
        $session = session()->get('rent_session');
        $data = Destination::where('id',$data->id)->get();
        $id = Str::uuid()->toString();
        $save = new RentDestination();
        $save->id = $id;
        $save->page_id = $data[0]->id; //text
        $save->image = ''; //text
        $save->tenant_id = $session['tenant_id']; //char(36)
        $save->save();
    }

    public function update(object $data)
    {
        Destination::all();
        if(!empty($data->photos)){
            $filename = new Upload($data);
            $image = 'page/'.$filename->upload('page');
        }else{
            $image = $data->image;
        }
        $save = RentDestination::find($data->page_id);
        $save->image = $image; //text
        $save->is_status = $data->status; //text
        $save->save();

        if(!empty($data->title)){
            RentPageLanguage::where('rent_page_id', $data->page_id)->delete();
            foreach ($data->title as $key => $value) {
                $record = new RentPageLanguage();
                $record->id = Str::uuid()->toString();
                $record->rent_page_id = $data->page_id;
                $record->name = $value;
                $record->seo = $value;
                $record->lang_id = $key;
                $record->description = @$data->description[$key];
                $record->meta = @$data->meta[$key];
                $record->tags = @$data->tags[$key];
                $record->save();
            }
        }
    }

}
