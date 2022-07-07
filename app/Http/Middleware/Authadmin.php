<?php

namespace App\Http\Middleware; 
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authadmin
{
   
    public function handle(Request $request, Closure $next, $roles)
    { 
        if (Auth::user()->user_akses =='admin')
        { 
            return $next($request);
        }
        return redirect('/');
 
    }
}
