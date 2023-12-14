<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class UserAccessMiddleWare
{
    public function handle($request, Closure $next)
    {
        session_start();
        if (Session::get('is_user')) {
            return $next($request);
        }
        else{
            return redirect('login');
        }
    }
}
