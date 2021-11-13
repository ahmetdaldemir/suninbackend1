<?php

namespace App\Http\Controllers\Rent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{

    public function __construct()
    {
        if(!Session::get('rent_session'))
        {
            $this->getCache();
        }
    }

    public function index()
    {
        return view('rent/dashboard/index');
    }


}
