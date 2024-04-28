<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;


use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BuyerMiddleware
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
        if($user->role=='buyer'){
            return $next($request);
        }
        if($user->role=='admin'){
            return redirect()->route('admin');
        }
        if($user->role=='seller'){
            return redirect()->route('seller');
        }
        
        else{
            return response()->json(['no access!!']);
        }  
     }
}
