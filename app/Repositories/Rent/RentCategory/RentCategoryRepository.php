<?php namespace App\Repositories\Rent\RentCategory;

use App\Models\Category;
use App\Models\RentCategory;
use App\Models\RentCategoryLanguage;
use App\Services\Upload;
use Illuminate\Support\Str;

class RentCategoryRepository implements RentCategoryRepositoryInterface
{
    public function get($id)
    {
        Category::all();
        $data = [];
        $results = RentCategory::where('id',$id)->get();
        foreach ($results as $result) {
            $data[] = array(
                'id' => $result->id,
                'category_id' => $result->category_id,
                'image' => $result->image,
                'sort' => $result->sort,
                'status' => $result->status,
                'lang' => $result->get_data()
            );
        }
        return @$data[0];
    }

    public function all()
    {
        $category_data = array();
        $session = session()->get('rent_session');
        $categories = Category::all();
        $rentcategories = RentCategory::where('tenant_id',$session['tenant_id'])->get();
        foreach ($rentcategories as $result) {
            $data[] = array(
                'id' => $result->id,
                'category_id' => $result->category_id,
                'image' => $result->image,
                'sort' => $result->sort,
                'status' => $result->status,
                'lang' => $result->get_data()
            );
/*            $category_data[$rentcategory['category_id']] = array(
                'id' => $rentcategory['id'],
                'category_id' => $rentcategory['category_id'],
                'image' => $rentcategory['image'],
                'sort' => $rentcategory['sort'],
                'status' => $rentcategory['status'],
                'name' => $rentcategory['name'],
                'lang' => $rentcategory->get_data()
            );*/
        }

        /*foreach ($categories as $category){
            $data['categories'][] = array(
                'id' => $category['id'],
                'image' => $category['image'],
                'lang' => $category->get_data(),
                'category' => @$category_data[$category['id']]
            );
        }*/
        return $data;
    }

    public function delete($id)
    {
        RentCategory::destroy($id);
    }

    public function create(object $data)
    {
        $session = session()->get('rent_session');
        $data = Category::where('id',$data->id)->get();
        $data['lang'] = $data[0]->get_data();
        $id = Str::uuid()->toString();
        $save = new RentCategory();
        $save->id = $id;
        $save->category_id = $data[0]->id; //text
        $save->image = $data[0]->image; //text
        $save->tenant_id = $session['tenant_id']; //char(36)
        $save->save();

        foreach ($data['lang'] as $lang) {
            $record = new RentCategoryLanguage();
            $record->id = Str::uuid()->toString();
            $record->rent_category_id = $id;
            $record->name = $lang['title'];
            $record->slug = $lang['slug'];
            $record->lang_id = $lang['lang_id'];
            $record->description = '';
            $record->meta = '';
            $record->tags = '';
            $record->save();
        }
    }

    public function update(object $data)
    {
        Category::all();
        if(!empty($data->photos)){
            $filename = new Upload($data);
            $image = 'category/'.$filename->upload('category');
        }else{
            $image = $data->image;
        }
        $save = RentCategory::find($data->category_id);
        $save->image = $image; //text
        $save->sort = $data->sort; //text
        $save->status = $data->status; //text
        $save->save();

        if(!empty($data->title)){
            RentCategoryLanguage::where('rent_category_id', $data->category_id)->delete();
            foreach ($data->title as $key => $value) {
                $record = new RentCategoryLanguage();
                $record->id = Str::uuid()->toString();
                $record->rent_category_id = $data->category_id;
                $record->name = $value;
                $record->slug =  Str::slug($value);;
                $record->lang_id = $key;
                $record->description = @$data->description[$key];
                $record->meta = @$data->meta[$key];
                $record->tags = @$data->tags[$key];
                $record->save();
            }
        }
    }
}
