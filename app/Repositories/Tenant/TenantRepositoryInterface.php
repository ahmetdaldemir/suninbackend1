<?php

namespace App\Repositories\Tenant;

interface TenantRepositoryInterface
{
    public function get($id);

    public function all();

    public function delete($id);

    public function update(object $data);

    public function create(object $data);
}
