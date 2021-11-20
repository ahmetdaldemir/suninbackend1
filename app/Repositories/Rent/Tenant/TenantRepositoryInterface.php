<?php

namespace App\Repositories\Rent\Tenant;

interface TenantRepositoryInterface
{
    public function get($id);

    public function type($type);

    public function all();

    public function delete($id);

    public function update(object $data);

    public function create(object $data);
}
