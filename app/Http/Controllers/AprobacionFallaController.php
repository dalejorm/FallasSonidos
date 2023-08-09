<?php

namespace App\Http\Controllers;

use App\Models\ReporteFalla;
use App\Http\Controllers\Controller;
use App\Http\Requests\AprobacionFallaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AprobacionFallaController extends Controller
{      


    public function update(AprobacionFallaRequest $request, ReporteFalla $gestionfalla){
        $user               = auth()->user();   
        error_log($gestionfalla->id); 
        $variableEstado = null;
        error_log($request->get('estado')); 
        if($request->get('estado') == 'Aprobar'){
            error_log("Ingreso a aprobar");             
            $gestionfalla->where('id', $gestionfalla->id)->update(['estado'=> 'Aprobado']);
            $variableEstado = 'Aprobado';
        }
        if($request->get('estado') == 'Rechazar'){ 
            error_log("Ingreso a rechazar");            
            $gestionfalla->where('id', $gestionfalla->id)->update(['estado'=> 'Rechazado']);
            $variableEstado = 'Rechazado';
        }
        if($request->get('estado') == 'Autoasignar'){ 
            $gestionfalla->where('id', $gestionfalla->id)->update(['id_user'=> $user->id, 'estado'=>'Aprobado']);
            $variableEstado = 'Autoasignado al administrador';
        }
        if($request->get('estado') == 'Eliminar'){ 
            Storage::delete('public/' . $gestionfalla->gragacion_principal);
            if($gestionfalla->gragacion_2 == null){
                Storage::delete('public/' . $gestionfalla->gragacion_2);
            }
            if($gestionfalla->gragacion_3 == null){
                Storage::delete('public/' . $gestionfalla->gragacion_3);
            }
            if($gestionfalla->gragacion_4 == null){
                Storage::delete('public/' . $gestionfalla->gragacion_4);
            }
            if($gestionfalla->gragacion_5 == null){
                Storage::delete('public/' . $gestionfalla->gragacion_5);
            }
            $gestionfalla->delete();
            $variableEstado = 'Registro eliminado correctamente';
        }
       
        return redirect()->route('gestion-fallas.index')->with('estado', "Se actualizo el estado del registro a: $variableEstado" );
        
    }

}