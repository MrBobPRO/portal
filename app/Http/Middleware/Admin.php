<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //redirect home case user hasn`t auth
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        //redirect home case user isn`t admin
        $user = Auth::user();
        if($user->role != 'admin') {
            return redirect()->route('home.index');
        }

        return $next($request);
    }
}
