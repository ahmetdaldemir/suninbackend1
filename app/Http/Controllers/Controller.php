<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $tenant_id;

    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];
        return response()->json($response, 200);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];


        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }


    public function getCache()
    {
//        $x = ltrim(request()->getRequestUri(),"/?");
//        $y =   Cache::get($x);
//        if($y == null)
//        {
//            return redirect('sahilvillam.com/app');
//        }
//        $this->tenant_id = $y['tenant_id'];
//        Session::put('rent_session', $y);
        Session::put('rent_session', "67667cb9-3933-40ab-b248-02a7f819f870");
    }


}
