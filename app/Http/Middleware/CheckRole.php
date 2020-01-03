<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $roles)
    {
        if (!Auth::check()) 
            return redirect('staff/login');

        $user = Auth::user();

        if($user->hasRoles($roles))
        {
            return $next($request);
        }

        return abort(403);
    }
}
