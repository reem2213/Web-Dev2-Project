<?php

namespace App\Http\Middleware;

use App\Models\Group;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GroupOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $group = Group::find($request->id);

        if ($group->admin_id == auth()->user()->id)
        {
            return $next($request);
        }
        else
        {
            return redirect('/events')->with('error', 'Unauthorized');
        }
        
    }
}
