<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laravel\Passport\Token;

class EnsureTokenIsValid
{

    public function handle(Request $request, Closure $next)
    {
        return $next($request);

//        $token = json_decode($request->header('token'));
//        $tokenresponse = Token::where('id', $token->token_id)->where('expires_at', '>', Carbon::now())->where('user_id', $token->user_id)->first();
//        if ($tokenresponse) {
//            return $next($request);
//        } else {
//            return response()->json(['status' => false, 'error' => 'Token Not Matched for User, Unauthorized Access.'], 401);
//        }
    }
}
