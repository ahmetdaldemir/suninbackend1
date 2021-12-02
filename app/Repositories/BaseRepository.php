<?php namespace App\Repositories;

use App\Models\Domain;


class BaseRepository
{
    protected $view_tenant_id;
    protected $lang_id;
    public function __construct()
    {
        $url  = url()->to('/');
        $domain = Domain::where('domain', $url)->first();
        $this->setTenantId($domain->tenant_id);
        $this->lang_id = '126e6025-6abf-4e4a-851a-d0a372f2f0cc';
    }

    public function setTenantId($tenant_id)
    {
        $this->view_tenant_id = $tenant_id;
    }

    public function getTenantId()
    {
        return $this->view_tenant_id;
    }
}