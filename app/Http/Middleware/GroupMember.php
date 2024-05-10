<?php

namespace App\Http\Middleware;

use App\Models\Group;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GroupMember
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $group = Group::find($request->id);

        $group_members = $group->participants()->get();

        foreach ($group_members as $group_member) 
        {
            $group_members_id[] = $group_member->id;
        }

        if (in_array(auth()->user()->id, $group_members_id))
        {
            return $next($request);
        }
        else
        {
            return redirect('/events')->with('error', 'Unauthorized');
        }
        
    }
}
