<?php namespace App\Repositories;

use App\Models\Domain;


class BaseRepository
{
    protected $view_tenant_id;
    public function __construct()
    {
        $url  = url()->to('/');
        $domain = Domain::where('domain', $url)->first();
        $this->view_tenant_id = $domain->tenant_id;
    }
}