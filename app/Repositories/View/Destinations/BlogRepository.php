<?php namespace App\Repositories\View\Blog;

use App\Models\Blog;
use App\Repositories\BaseRepository;

class BlogRepository extends BaseRepository  implements BlogRepositoryInterface
{

    public function get($id)
    {
        $data = [];
        $results = Blog::where('id',$id)->get();
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
        $results = Blog::where('tenant_id', $this->view_tenant_id)->get();
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
        Blog::destroy($id);
    }

    public function create(object $data)
    {

    }

    public function update(object $data)
    {

    }
}
