<?php namespace App\Repositories\Rent\Page;

use App\Models\Page;
use App\Models\RentPageLanguage;
use App\Models\RentPage;
use App\Repositories\BaseRepository;
use App\Services\Upload;
use Illuminate\Support\Str;

class RentPageRepository implements RentPageRepositoryInterface
{
    public function get($id)
    {
        Page::all();
        $data = [];
        $results = RentPage::where('id',$id)->get();
        foreach ($results as $result) {
            $data[] = array(
                'id' => $result->id,
                'page_id' => $result->page_id,
                'image' => $result->image,
                'status' => $result->is_status,
                'lang' => $result->get_data()
            );
        }
        //dd($data[0]);
        return $data[0];
    }

    public function getslug($slug)
    {
        $rentpage = RentPage::where('tenant_id', $this->getTenantId())->get();
        foreach ($rentpage as $rp){
           $detail[] = $rp->get_pages()->where('rent_page_id', $rp->id)->where('slug', $slug)->first();
        }
        $result = $detail[0];
        //dd($detail);
        $data = array(
            'id' => $result->id,
            'name' => $result->name,
            'description' => $result->description,
            'meta' => $result->meta,
            'tags' => $result->tags
        );
        return $data;
    }

    public function all()
    {
        $module_data = array();
        $session = session()->get('rent_session');
        $pages = Page::all();
        $rentpages = RentPage::where('tenant_id',"67667cb9-3933-40ab-b248-02a7f819f870")->get();
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
        RentPage::destroy($id);
    }

    public function create(object $data)
    {
        $session = session()->get('rent_session');
        $data = Page::where('id',$data->id)->get();
        $id = Str::uuid()->toString();
        $save = new RentPage();
        $save->id = $id;
        $save->page_id = $data[0]->id; //text
        $save->image = ''; //text
        $save->tenant_id = "67667cb9-3933-40ab-b248-02a7f819f870"; //char(36)
        $save->save();
    }

    public function update(object $data)
    {
        Page::all();
        if(!empty($data->photos)){
            $filename = new Upload($data);
            $image = 'page/'.$filename->upload('page');
        }else{
            $image = $data->image;
        }
        $save = RentPage::find($data->page_id);
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
                $record->slug = $value;
                $record->lang_id = $key;
                $record->description = @$data->description[$key];
                $record->meta = @$data->meta[$key];
                $record->tags = @$data->tags[$key];
                $record->save();
            }
        }
    }

}
