<?php namespace App\Repositories\View\Customer;

use App\Models\Customer;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CustomerRepository extends BaseRepository implements CustomerRepositoryInterface
{
    public function get($id)
    {
        return Customer::find($id);
    }

    public function all()
    {
        return Customer::all();
    }

    public function login(object $data)
    {
        $data->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $data->only('email', 'password');

        if (Auth::guard('webweb')->attempt(['email' => $data->email, 'password' => $data->password], false)) {
            return redirect()->intended('/')->withSuccess('Signed in');
        }
        else
        {
            return response()->json([
                'status'    => false,
                'data'      => [],
                'message'   => 'login email id or password invalid'
            ]);
        }
    }

    public function create(object $data)
    {
        $id = Str::uuid()->toString();
        $result = new Customer();
        $result->id = $id;
        $result->fullName = $data->fullname;
        $result->email = $data->username;
        $result->phone = $data->phone;
        $result->password = Hash::make($data->password);
        $result->is_status = 1;
        $result->tenant_id = $this->getTenantId();
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

    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
