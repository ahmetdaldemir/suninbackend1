<?php namespace App\Repositories\View\RentCategory;

use App\Models\RentCategory;
use App\Models\RentCategoryLanguage;
use App\Repositories\BaseRepository;

class RentCategoryRepository extends BaseRepository implements RentCategoryRepositoryInterface
{

    public function get($id)
    {
        $data = [];
        $results = RentCategory::where('id',$id)->get();
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
        $data = [];
        $results = RentCategory::where('tenant_id', $this->getTenantId())->get();
        foreach ($results as $result) {
            $data[] = array(
                'id' => $result->id,
                'category' => $result,
                'lang' => $result->get_data()
            );
        }
        return $data;
    }


    public function getslug($slug)
    {
        $rentcategory = new RentCategory();
        $rentcategory_language = RentCategoryLanguage::where('slug', $slug)->where('lang_id', $this->lang_id)->first();
        $result = $rentcategory::where('id', $rentcategory_language->rent_category_id)->first();
        $data = array(
            'id' => $result->id,
            'lang' => $result->get_data(),
            'rentcategory' => $result
        );
        return $data;
    }
}
