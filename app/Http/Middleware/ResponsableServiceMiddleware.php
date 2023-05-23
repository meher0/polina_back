<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResponsableServiceMiddleware
{
    
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->role == 'responsable')
        {
            return $next($request);
        }
        else
        {
            return redirect('404')->with('status', 'You are not allowed to acces the responsable.!');
        }
    }
}
