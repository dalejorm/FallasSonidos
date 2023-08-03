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
       
        return redirect()->route('gestion-fallas.index')->with('estado', "Se actualizo el estado del registro a: $variableEstado" );
        
    }

}