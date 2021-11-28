<?php namespace App\Repositories\Rent\RentPage;

use App\Models\RentPage;


class RentPageRepository implements RentPageRepositoryInterface
{

    public function all()
    {
        $session = session()->get('rent_session');
        $data = [];
        $results = Page::where('tenant_id', $session['tenant_id'])->get();
        foreach ($results as $result) {
            $data[] = array(
                'id' => $result->id,
                'lang' => $result->get_data()
            );
        }
        return $data;
    }

    public function get($id)
    {
        $data = [];
        $results = Page::where('id',$id)->get();
        foreach ($results as $result) {
            $data[] = array(
                'id' => $result->id,
                'image' => $result->image,
                'image' => $result->image,
                'lang' => $result->get_data()
            );
        }
        return $data;
    }

    public function delete($id)
    {
        RentPage::destroy($id);
    }
    public function create(object $data)
    {
        $session = session()->get('rent_session');
        $filename = new Upload($data);
        $image = $filename->upload('rent_page');

        $id = Str::uuid()->toString();
        $result = new RentPage();
        $result->id = $id;
        $result->image = 'blog/'.$image;
        $result->tenant_id = $session['tenant_id'];
        $result->save();

        foreach ($data->title as $key => $value) {
            $servicelanguage = new RentPageLanguage();
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

        $blog = RentPage::find($data->blog_id);
        $blog->image = $image;
        $blog->save();

        RentPageLanguage::where('blog_id', $data->blog_id)->delete();
        foreach ($data->title as $key => $value) {
            $servicelanguage = new RentPageLanguage();
            $servicelanguage->id = Str::uuid()->toString();
            $servicelanguage->blog_id = $data->blog_id;
            $servicelanguage->title = $value;
            $servicelanguage->language_id = $key;
            $servicelanguage->description = $data->description[$key];
            $servicelanguage->save();
        }
    }
}
