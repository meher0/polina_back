<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TechnicienMiddleware
{
    
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->role == 'technicien')
        {
            return $next($request);
        }
        else
        {
            return redirect('404')->with('status', 'You are not allowed to acces the technicien.!');
        }
    }
}
