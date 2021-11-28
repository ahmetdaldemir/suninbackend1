<?php namespace App\Repositories\Rent\Page;

use App\Models\Page;


class PageRepository implements  PageRepositoryInterface
{

    public function get($id)
    {
        return Page::find($id);
    }

    public function all()
    {
        return Page::all();
    }
}
