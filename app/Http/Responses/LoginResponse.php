<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{

    public function toResponse($request)
    {

        // below is the existing response
        // replace this with your own code
        // the user can be located with Auth facade

        $authUser = Auth::user();
        error_log('rol 1');
        error_log($authUser);

        // ? Validamos si el usuario esta activo o inactivo para ingresar en la plataforma
        if($authUser->active == false){
            // ! si esta desactivado el usuario lo sacamos del sistema y notificamos el motivo
            Auth::logout();
            error_log('Cierre 1');
            return redirect()->route('login')->with('status', __('El usuario está desactivado.'));
        }

        switch ($authUser) {
            case $authUser->hasRole(1):
                return redirect()->route('dashboard');
            break;

            case $authUser->hasRole(2):
                return redirect()->route('dashboard');
            break;

            case $authUser->hasRole(3):
                error_log('Entro al rol 3');
                return redirect()->route('dashboard');
            break;

            case $authUser->hasRole(4):
                return redirect()->route('dashboard');
            break;

            case $authUser->hasRole(0):
                error_log('Entro al rol 0');
                return redirect()->route('dashboard');
            break;

            default:
            error_log('Entro al default 1');
                return redirect()->route('/');
            break;
        }

        return $request->wantsJson()
                    ? response()->json(['two_factor' => false])
                    : redirect()->intended(config('fortify.home'));
    }
}