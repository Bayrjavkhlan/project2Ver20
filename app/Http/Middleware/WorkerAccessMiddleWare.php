<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class WorkerAccessMiddleWare
{
    public function handle($request, Closure $next)
    {
        session_start();
        if (Session::get('is_worker')) {
            return $next($request);
        }
        else{
            return redirect('workerLogin');
        }
    }
}
