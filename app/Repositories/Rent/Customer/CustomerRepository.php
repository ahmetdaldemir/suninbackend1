<?php namespace App\Repositories\Rent\Customer;

use App\Models\Customer;


class CustomerRepository implements CustomerRepositoryInterface
{

    public function get($id)
    {
        return Customer::find($id);
    }

    public function all()
    {
        return Customer::all();
    }

    public function delete($id)
    {
        Customer::destroy($id);
    }

    public function create(object $data)
    {
        Customer::save($data);
    }

    public function update(object $data)
    {
        Customer::find($id)->update($data);
    }
}
