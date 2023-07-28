<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\NotificationController;
use Illuminate\Http\Request;

class GestionUsuarioController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$this->authorize('index_ideas_empresa', IdeaEmpresa::class);

        $user               = auth()->user();       
        $users       = User::orderBy('name', 'ASC')->paginate(10);        

        return view('GestionFallas.index', compact('fallas'));
    }

    public function show()
    {
        $user               = auth()->user();  
        return view('GestionUsuarios.show', compact('user'));
    }

    public function update(UserRequest $request, $user, User $usuario){
        error_log($user);  
        if($request->get('accion') == 'estado'){
            if($request->get('active') == 1){
                $usuario->where('id', $user)->update(['active'=> 0]);
            }
            if($request->get('active') == 0){
                $usuario->where('id', $user)->update(['active'=> 1]);
            }
        return redirect()->route('gestion-usuarios.index')->with('estado', 'Se actualizo el estado del usuario');
        }
    }

}