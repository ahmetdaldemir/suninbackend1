<?php namespace App\Repositories\Tenant;

use App\Models\Tenant;

class TenantRepository implements TenantRepositoryInterface
{

    public function get($id)
    {
        $tenants = Tenant::find($id);
        foreach ($tenants as $tenant) {
            $array = json_decode($tenant->data);
            $data = array(
                'type' => $tenant->type,
                'title' => $array->title,
                'company' => $array->company,
                'email' => $array->email,
                'phone' => $array->phone,
            );
        }
        return $data;
    }

    public function all()
    {
        $tenants = Tenant::all();
        foreach ($tenants as $tenant) {
            print_r($tenant->dataya);

            $data[] = array(
                'type' => $tenant->type,
                'title' => $tenant->data['title'],
                'company' => $tenant->data['company'],
                'email' => $tenant->data['email'],
                'phone' => $tenant->data['phone'],
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
        $array = array('title' => $data->title, 'company' => $data->company, 'email' => $data->email, 'phone' => $data->phone);
        $tenant = new  Tenant();
        $tenant->type = $data->type;
        $tenant->data = json_encode($array);
        $tenant->save();
    }

    public function update(object $data)
    {
        $array = array('title' => $data->title, 'company' => $data->company, 'email' => $data->email, 'phone' => $data->phone);
        $tenant = Tenant::find($data->id);
        $tenant->type = $data->type;
        $tenant->data = json_encode($array);
        $tenant->save();
    }
}
