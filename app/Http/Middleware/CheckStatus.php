<?php

namespace App\Http\Middleware;

use Closure;

class CheckStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();

        if (!empty($user->userdetails->hospital))
        {
            return abort(403, 'You are in hospital.');
        }

        if (!empty($user->userdetails->jail))
        {
            return abort(403, 'You are in jail.');
        }

    return $next($request);
    }
}
