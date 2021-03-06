<?php namespace App\Repositories\Rent\Tenant;

use App\Models\Tenant;
use App\Models\User;

class TenantRepository implements TenantRepositoryInterface
{

    public function get($id)
    {
        $tenant = Tenant::find($id);
        $data = array(
            'id' => $tenant->id,
            'type' => $tenant->type,
            'title' => $tenant->info['title'],
            'company' => $tenant->info['company'],
            'email' => $tenant->info['email'],
            'phone' => $tenant->info['phone'],
        );
        return $data;
    }

    public function type($type)
    {
        $tenants = Tenant::where('type',$type)->get();
        foreach($tenants as $tenant)
        {
            $data[] = array(
                'id'      => $tenant->id,
                'type'    => $tenant->type,
                'title'   => $tenant->info['title'],
                'company' => $tenant->info['company'],
                'email'   => $tenant->info['email'],
                'phone'   => $tenant->info['phone'],
            );
        }

        return $data;
    }

    public function all()
    {
        $data = [];
        $tenants = Tenant::all();
        foreach ($tenants as $tenant) {
            $data[] = array(
                'id' => $tenant->id,
                'type' => $tenant->type,
                'title' => $tenant->info['title'],
                'company' => $tenant->info['company'],
                'email' => $tenant->info['email'],
                'phone' => $tenant->info['phone'],
            );
        }
        return $data;
    }

    public function delete($id)
    {
        Tenant::destroy($id);
    }

    public function create(object $data)
    {
        $properties['title'] = $data->title;
        $properties['company'] = $data->company;
        $properties['email'] = $data->email;
        $properties['phone'] = $data->phone;

        $tenant = new  Tenant();
        $tenant->type = $data->type;
        $tenant->info = $properties;
        $tenant->save();
        $id = $tenant->id;

        $user = new User();
        $user->tenant_id = $id;
        $user->name = $data->title;
        $user->email = $data->email;
        $user->password = bcrypt('123456');
        $user->save();

        //$this->dispatch();

        return $tenant;
    }

    public function update(object $data)
    {

        $properties['title'] = $data->title;
        $properties['company'] = $data->company;
        $properties['email'] = $data->email;
        $properties['phone'] = $data->phone;

        $tenant = Tenant::find($data->id);
        $tenant->type = $data->type;
        $tenant->info = $properties;
        $tenant->save();

        return $tenant;
    }
}
