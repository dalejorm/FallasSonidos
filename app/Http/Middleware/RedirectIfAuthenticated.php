<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;
        $authUser = Auth::user();
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                error_log('Create entro 2');
                if($authUser->active == false){
                    error_log('Create entro 3');
                    Auth::logout();
                    return redirect()->route('login')->with('status', __('El usuario está desactivado.'));
                } else {
                    return redirect(RouteServiceProvider::HOME);
                }                
            }
        }

        return $next($request);
    }
}
