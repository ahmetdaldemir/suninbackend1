<?php namespace App\Repositories\Rent\Customer;

use App\Models\Customer;
use Illuminate\Support\Str;


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
        $session = session()->get('rent_session');
        $id = Str::uuid()->toString();
        $result = new Customer();
        $result->id = $id;
        $result->fullName = $data->fullName;
        $result->email = $data->email;
        $result->phone = $data->phone;
        $result->taxTitle = $data->taxTitle;
        $result->tax = $data->tax;
        $result->taxNumber = $data->taxNumber;
        $result->taxAddress = $data->taxAddress;
        $result->address = $data->taxAddress;
        $result->is_einvoice = $data->is_einvoice;
        $result->is_status = $data->is_status;
        $result->tenant_id = "67667cb9-3933-40ab-b248-02a7f819f870";
        $result->save();
    }


    public function update(object $data)
    {
        $result = Customer::find($data->id);
        $result->fullName = $data->fullName;
        $result->email = $data->email;
        $result->phone = $data->phone;
        $result->taxTitle = $data->taxTitle;
        $result->tax = $data->tax;
        $result->taxNumber = $data->taxNumber;
        $result->taxAddress = $data->taxAddress;
        $result->address = $data->taxAddress;
        $result->is_einvoice = $data->is_einvoice;
        $result->is_status = $data->is_status;
        $result->save();
    }
}
