<?php namespace App\Repositories\View\RentDestination;

use App\Models\RentDestination;
use App\Models\RentDestinationLanguage;
use App\Repositories\BaseRepository;

class RentDestinationRepository extends BaseRepository  implements RentDestinationRepositoryInterface
{

    public function get($id)
    {
        $data = [];
        $results = RentDestination::where('id',$id)->get();
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
        $results = RentDestination::where('tenant_id', $this->getTenantId())->get();
        foreach ($results as $result) {
            $data[] = array(
                'id' => $result->id,
                'destination' => $result,
                'lang' => $result->get_data()
            );
        }
        return $data;
    }


    public function getslug($slug)
    {
        $rentdestination = new RentDestination();
        $rentdestination_language = RentDestinationLanguage::where('slug', $slug)->where('lang_id', $this->lang_id)->first();
        $result = $rentdestination::where('id', $rentdestination_language->rent_destination_id)->first();
        $data = array(
            'id' => $result->id,
            'lang' => $result->get_data(),
            'rentdestination' => $result
        );
        return $data;
    }
}
