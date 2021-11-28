<?php namespace App\Repositories\View\Destination;

use App\Models\Destination;
use App\Repositories\BaseRepository;

class DestinationRepository extends BaseRepository  implements DestinationRepositoryInterface
{

    public function get($id)
    {
        $data = [];
        $results = Destination::where('id',$id)->get();
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
        $results = Destination::where('tenant_id', $this->view_tenant_id)->get();
        foreach ($results as $result) {
            $data[] = array(
                'id' => $result->id,
                'blog' => $result,
                'lang' => $result->get_data()
            );
        }
        return $data;
    }

    public function delete($id)
    {
        Destination::destroy($id);
    }

    public function create(object $data)
    {

    }

    public function update(object $data)
    {

    }
}
