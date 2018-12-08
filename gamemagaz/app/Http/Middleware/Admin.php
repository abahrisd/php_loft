<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle($request, Closure $next, $guard = null)
    {
//        dd (Auth::user());

        if (!Auth::user()->is_admin) {
            return redirect()->route('not-admin');
        }

        return $next($request);
    }

    /*protected function redirectTo()
    {

        dd(Auth::user());
        return;
        if (! Auth::user()->is_admin) {
            return route('not-admin');
        }
    }*/
}
