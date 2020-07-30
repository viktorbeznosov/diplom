<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (url()->previous() == route('order')){
            $redirrect = '/order';
        } else {
            $redirrect = '/account';
        }
        $user = User::where('email','=',$request->get('email'))->first();
        if (isset($user->password)){
            if ($user->password == ''){
                Auth::login($user);
                return redirect($redirrect);
            }
//            else {
//                dump(Hash::make($request->get('password')));die();
//                if($user->password == bcrypt($request->get('password'))){
//                    dump($user);die();
//                }
//            }
        }

        if (Auth::guard ($guard)->check()) {
            return redirect($redirrect);
        }

        return $next($request);
    }
}
