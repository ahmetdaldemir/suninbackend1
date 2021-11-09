<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class Cors
{
    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     */
//    public function handle($request, Closure $next)
//    {
//        Log::info("Using cors for " . $request->url());
//        $response = $next($request);
//        $response->headers->set('Access-Control-Allow-Origin', '*');
//        $response->headers->set('Access-Control-Allow-Methods', 'POST, GET, PUT, OPTIONS,DELETE');
//        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With, Application', 'ip', 'Token');
//        return $response;
//    }
    public function handle($request, Closure $next) {
        Log::info("Using cors for " . $request->url());
        return $next($request)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Accept, Authorization, X-Request-With,Token');// <-- Adding this
    }
//    protected function getRouteForMethods($request, array $methods)
//    {
//        if ($request->method() === 'OPTIONS') {
//            return (new Route('OPTIONS', $request->path(), function () use ($methods) {
//                return new Response('', 200, ['Allow' => implode(',', $methods)]);
//            }))->bind($request);
//        }
//
//        $this->methodNotAllowed($methods, $request->method());
//    }


}

//
//namespace App\Http\Middleware;
//
//use Closure;
//use Illuminate\Support\Facades\Response;
//
//class Cors
//{
//
//    /**
//     * Handle an incoming request.
//     *
//     * @param \Illuminate\Http\Request $request
//     * @param \Closure $next
//     * @return mixed
//     */
//    public function handle($request, Closure $next)
//    {
//
//
//        if($request->isMethod('OPTIONS')) {
//            $response = response('', 200);
//        } else {
//            $response = $next($request);
//        }
//
//
//        $IlluminateResponse = 'Illuminate\Http\Response';
//        $SymfonyResopnse = 'Symfony\Component\HttpFoundation\Response';
//        $headers = [
//            'Access-Control-Allow-Origin' => '*',
//            'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, PATCH, DELETE',
//            'Access-Control-Allow-Headers' => 'Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Authorization , Access-Control-Request-Headers, X-CSRF-TOKEN'
//        ];
//
//        if ($response instanceof $IlluminateResponse) {
//            $response->header('Access-Control-Allow-Methods', 'HEAD, GET, POST, PUT, PATCH, DELETE');
//            $response->header('Access-Control-Allow-Headers', $request->header('Access-Control-Request-Headers'));
//            $response->header('Access-Control-Allow-Origin', '*');
//            return $response;
//        }
//
//        if ($response instanceof $SymfonyResopnse) {
//
//            foreach ($headers as $key => $value) {
//                $response->headers->set($key, $value);
//            }
//            return $response;
//        }
//
//        return $response;
//
//
//    }
//
//}