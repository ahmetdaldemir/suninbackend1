<?php

namespace App\Http\Controllers;


use App\Models\Customer;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $model = "Customer";

    public function __construct()
    {
        $this->middleware('guest:web-user')->except('logout');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::guard('web-user')->attempt($credentials,true)) {
            $customer = Customer::where('email',$request->email)->first();
            Auth::login($customer, true);
            return redirect()->to('/');
        } else {
            return redirect()->to('login')->with('error', 'Email & Password are incorrect.');
        }
    }

    public function logout()
    {
        Auth::guard('web-user')->logout();
        return redirect()->to('login');
    }
}