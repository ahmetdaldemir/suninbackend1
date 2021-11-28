<?php namespace App\Repositories\Page;

use App\Models\Page;


class PageRepository implements PageRepositoryInterface
{

    public function get($id)
    {
        return Page::find($id);
    }

    public function all()
    {
        return Page::all();
    }

    public function delete($id)
    {
        Page::destroy($id);
    }

    public function create(object $data)
    {
        Page::save($data);
    }

    public function update(object $data)
    {
        Page::find($id)->update($data);
    }
}
