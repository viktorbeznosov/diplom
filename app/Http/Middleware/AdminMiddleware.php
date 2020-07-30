<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;

class AdminMiddleware
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
        if (!Auth::check()){
            return redirect()->route('admin.login');
        } else if(Auth::check() && !$request->user()->hasRole('admin')){
            Auth::logout();
            return redirect()->route('admin.login')->withErrors(['Вы не являеетесь админом']);
        }

        return $next($request);
    }
}
