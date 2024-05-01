<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
//Admin middleware

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }
        $user=Auth::user();
        if($user->role=='admin'){
            return $next($request);
        }
        if($user->role=='buyer'){
            return redirect()->route('buyer');
        }
        if($user->role=='seller'){
            return redirect()->route('seller');
        }
        
        
        else{
            return response()->json(['no access!!']);
        }
    }
}
