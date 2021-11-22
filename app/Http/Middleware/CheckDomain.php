<?php

namespace App\Http\Middleware;

use App\Models\Domain;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckDomain
{
    public function handle(Request $request, Closure $next)
    {

        return $next($request);
    }
}
