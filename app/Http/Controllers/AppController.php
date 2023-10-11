<?php

namespace App\Http\Controllers;

use App\Models\Vehicles;
use App\Models\Anos;
use Illuminate\Http\Request;
use App\Models\ReporteFalla;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{


    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show node dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $alerta = false; 
        $marcas = DB::table('vehicles')->orderBy('name', 'asc')->get();
        $anos =  DB::table('anos')->orderBy('name', 'desc')->get();
        $results=[];

        return view('dashboard', compact('marcas', 'anos', 'alerta', 'results'));
    }



    public function busqueda(Request $request){       
        $cadenaBusqueda = $request->get('txt-search');
        error_log(strlen($cadenaBusqueda));
        $modeloBusqueda = $request->get('modelo');
        $marcaBusqueda = $request->get('marca');
        $sistemaBusqueda = $request->get('sistema_falla');
        $alerta = false; // Inicialmente, la alerta está desactivada
        $results = "";
        $marcas = DB::table('vehicles')->orderBy('name', 'asc')->get();
        $anos =  DB::table('anos')->orderBy('name', 'desc')->get();

        if (!is_null($cadenaBusqueda)) {
            // Realiza la búsqueda
            $results = ReporteFalla::where('estado', '=', 'Aprobado')
                ->where('modelo', '=', $modeloBusqueda)
                ->where('marca', '=', $marcaBusqueda)
                ->where('sistema_falla', '=', $sistemaBusqueda)
                ->where(function ($query) use ($cadenaBusqueda) {
                    $query->orWhere('nombre_falla', 'LIKE', '%' . $cadenaBusqueda . '%')
                        ->orWhere('descripcionusuario_falla', 'LIKE', '%' . $cadenaBusqueda . '%')
                        ->orWhere('descripcion_reparacion', 'LIKE', '%' . $cadenaBusqueda . '%');
                })->get();
        
            // Comprueba si no se encontraron resultados
            if (count($results) > 0) {
                $alerta = false; 
            } else {
                $alerta = true; 
            }
        }

        if (!is_null($modeloBusqueda)) {
            // Realiza la búsqueda
            $results = ReporteFalla::where('estado', '=', 'Aprobado')
                ->where('modelo', '=', $modeloBusqueda)
                ->where('marca', '=', $marcaBusqueda)
                ->where('sistema_falla', '=', $sistemaBusqueda)
                ->where(function ($query) use ($cadenaBusqueda) {
                    $query->orWhere('nombre_falla', 'LIKE', '%' . $cadenaBusqueda . '%')
                        ->orWhere('descripcionusuario_falla', 'LIKE', '%' . $cadenaBusqueda . '%')
                        ->orWhere('descripcion_reparacion', 'LIKE', '%' . $cadenaBusqueda . '%');
                })->get();
        
            // Comprueba si no se encontraron resultados
            if (count($results) > 0) {
                $alerta = false; 
            } else {
                $alerta = true; 
            }
        }

        if (!is_null($marcaBusqueda)) {
            // Realiza la búsqueda
            $results = ReporteFalla::where('estado', '=', 'Aprobado')
                ->where('modelo', '=', $modeloBusqueda)
                ->where('marca', '=', $marcaBusqueda)
                ->where('sistema_falla', '=', $sistemaBusqueda)
                ->where(function ($query) use ($cadenaBusqueda) {
                    $query->orWhere('nombre_falla', 'LIKE', '%' . $cadenaBusqueda . '%')
                        ->orWhere('descripcionusuario_falla', 'LIKE', '%' . $cadenaBusqueda . '%')
                        ->orWhere('descripcion_reparacion', 'LIKE', '%' . $cadenaBusqueda . '%');
                })->get();
        
            // Comprueba si no se encontraron resultados
            if (count($results) > 0) {
                $alerta = false; 
            } else {
                $alerta = true; 
            }
        }


        if (!is_null($sistemaBusqueda)) {
            // Realiza la búsqueda
            $results = ReporteFalla::where('estado', '=', 'Aprobado')
                ->where('modelo', '=', $modeloBusqueda)
                ->where('marca', '=', $marcaBusqueda)
                ->where('sistema_falla', '=', $sistemaBusqueda)
                ->where(function ($query) use ($cadenaBusqueda) {
                    $query->orWhere('nombre_falla', 'LIKE', '%' . $cadenaBusqueda . '%')
                        ->orWhere('descripcionusuario_falla', 'LIKE', '%' . $cadenaBusqueda . '%')
                        ->orWhere('descripcion_reparacion', 'LIKE', '%' . $cadenaBusqueda . '%');
                })->get();
        
            // Comprueba si no se encontraron resultados
            if (count($results) > 0) {
                $alerta = false; 
            } else {
                $alerta = true; 
            }
        }

        //------------------------------------------------------------------------
        
        if(is_null($cadenaBusqueda) and $modeloBusqueda == 'nulo' and $marcaBusqueda == 'nulo' and $sistemaBusqueda == 'nulo' ){
            error_log("Entro sin nada");
            $results = ReporteFalla::where('estado','=', 'Aprobado')->get();
            return view('dashboard', compact('marcas', 'anos', 'results', 'alerta'));
        }

       if(!is_null($cadenaBusqueda) and $modeloBusqueda != 'nulo' and $marcaBusqueda != 'nulo' and $sistemaBusqueda != 'nulo' ){
            error_log("Entro completo");
            $results = ReporteFalla::where('estado','=', 'Aprobado')
            ->where('modelo', '=', $modeloBusqueda)
            ->where('marca', '=', $marcaBusqueda)
            ->where('sistema_falla', '=', $sistemaBusqueda)
            ->where(function ($query) use ($cadenaBusqueda) {
                $query->orWhere('nombre_falla' , 'LIKE','%'.$cadenaBusqueda.'%')
                ->orWhere('descripcionusuario_falla' , 'LIKE','%'.$cadenaBusqueda.'%')
                ->orWhere('descripcion_reparacion','LIKE', '%'.$cadenaBusqueda.'%');
            })->get();
            return view('dashboard', compact('marcas', 'anos', 'results', 'alerta'));
        }
        if(!is_null($cadenaBusqueda) and $modeloBusqueda == 'nulo' and $marcaBusqueda != 'nulo' and $sistemaBusqueda != 'nulo' ){
            error_log("Entro sin modelo");
            $results = ReporteFalla::where('estado','=', 'Aprobado')
            ->where('marca', '=', $marcaBusqueda)
            ->where('sistema_falla', '=', $sistemaBusqueda)
            ->where(function ($query) use ($cadenaBusqueda) {
                $query->orWhere('nombre_falla' , 'LIKE','%'.$cadenaBusqueda.'%')
                ->orWhere('descripcionusuario_falla' , 'LIKE','%'.$cadenaBusqueda.'%')
                ->orWhere('descripcion_reparacion','LIKE', '%'.$cadenaBusqueda.'%');
            })->get();
            
            return view('dashboard', compact('marcas', 'anos', 'results', 'alerta'));
        } 

        if(!is_null($cadenaBusqueda) and $modeloBusqueda != 'nulo' and $marcaBusqueda == 'nulo' and $sistemaBusqueda != 'nulo' ){
            error_log("Entro sin marca");
            $results = ReporteFalla::where('estado','=', 'Aprobado')
            ->where('modelo', '=', $modeloBusqueda)
            ->where('sistema_falla', '=', $sistemaBusqueda)
            ->where(function ($query) use ($cadenaBusqueda) {
                $query->orWhere('nombre_falla' , 'LIKE','%'.$cadenaBusqueda.'%')
                ->orWhere('descripcionusuario_falla' , 'LIKE','%'.$cadenaBusqueda.'%')
                ->orWhere('descripcion_reparacion','LIKE', '%'.$cadenaBusqueda.'%');
            })->get();
            return view('dashboard', compact('marcas', 'anos', 'results', 'alerta'));
        } 
        if(!is_null($cadenaBusqueda) and $modeloBusqueda != 'nulo' and $marcaBusqueda != 'nulo' and $sistemaBusqueda == 'nulo' ){
            error_log("Entro sin sistema");
            $results =  ReporteFalla::where('estado','=', 'Aprobado')
            ->where("modelo", "=", $modeloBusqueda)
            ->where("marca", "=", $marcaBusqueda)
            ->where(ReporteFalla::raw("(nombre_falla like '%'.$cadenaBusqueda.'%' or descripcionusuario_falla like '%'.$cadenaBusqueda.'%' or descripcion_reparacion like '%'.$cadenaBusqueda.'%')"))
            ->get();
            return view('dashboard', compact('marcas', 'anos', 'results', 'alerta'));
        } 

        if(is_null($cadenaBusqueda) and $modeloBusqueda != 'nulo' and $marcaBusqueda != 'nulo' and $sistemaBusqueda != 'nulo' ){
            error_log("Entro sin cadena");
            $results = ReporteFalla::where('estado','=', 'Aprobado')
            ->where('modelo', '=', $modeloBusqueda)
            ->where('marca', '=', $marcaBusqueda)
            ->where('sistema_falla', '=', $sistemaBusqueda)
            ->get();
            return view('dashboard', compact('marcas', 'anos', 'results', 'alerta'));
        }
            
        if(!is_null($cadenaBusqueda) and $modeloBusqueda == 'nulo' and $marcaBusqueda == 'nulo' and $sistemaBusqueda != 'nulo' ){
            error_log("Entro sin modelo y marca");
            $results = ReporteFalla::where('estado','=', 'Aprobado')
            ->where('sistema_falla', '=', $sistemaBusqueda)
            ->where(function ($query) use ($cadenaBusqueda) {
                $query->orWhere('nombre_falla' , 'LIKE','%'.$cadenaBusqueda.'%')
                ->orWhere('descripcionusuario_falla' , 'LIKE','%'.$cadenaBusqueda.'%')
                ->orWhere('descripcion_reparacion','LIKE', '%'.$cadenaBusqueda.'%');
            })->get();
            return view('dashboard', compact('marcas', 'anos', 'results', 'alerta'));
        }

        if(!is_null($cadenaBusqueda) and $modeloBusqueda == 'nulo' and $marcaBusqueda != 'nulo' and $sistemaBusqueda == 'nulo' ){
            error_log("Entro sin modelo y sistema");
            $results = ReporteFalla::where('estado','=', 'Aprobado')
            ->where('marca', '=', $marcaBusqueda)
            ->where(function ($query) use ($cadenaBusqueda) {
                $query->orWhere('nombre_falla' , 'LIKE','%'.$cadenaBusqueda.'%')
                ->orWhere('descripcionusuario_falla' , 'LIKE','%'.$cadenaBusqueda.'%')
                ->orWhere('descripcion_reparacion','LIKE', '%'.$cadenaBusqueda.'%');
            })->get();
            return view('dashboard', compact('marcas', 'anos', 'results', 'alerta'));
        }

        if(!is_null($cadenaBusqueda) and $modeloBusqueda != 'nulo' and $marcaBusqueda == 'nulo' and $sistemaBusqueda == 'nulo' ){
            error_log("Entro sin marca y sistema");
            $results = ReporteFalla::where('estado','=', 'Aprobado')
            ->where('modelo', '=', $modeloBusqueda)
            ->where(function ($query) use ($cadenaBusqueda) {
                $query->orWhere('nombre_falla' , 'LIKE','%'.$cadenaBusqueda.'%')
                ->orWhere('descripcionusuario_falla' , 'LIKE','%'.$cadenaBusqueda.'%')
                ->orWhere('descripcion_reparacion','LIKE', '%'.$cadenaBusqueda.'%');
            })->get();
            return view('dashboard', compact('marcas', 'anos', 'results', 'alerta'));
        }

        if(is_null($cadenaBusqueda) and $modeloBusqueda != 'nulo' and $marcaBusqueda == 'nulo' and $sistemaBusqueda != 'nulo' ){
            error_log("Entro sin cadena y marca");
            $results = ReporteFalla::where('estado','=', 'Aprobado')
            ->where('modelo', '=', $modeloBusqueda)
            ->where('sistema_falla', '=', $sistemaBusqueda)
            ->get();
            return view('dashboard', compact('marcas', 'anos', 'results', 'alerta'));
        }

        if(is_null($cadenaBusqueda) and $modeloBusqueda != 'nulo' and $marcaBusqueda != 'nulo' and $sistemaBusqueda == 'nulo' ){
            error_log("Entro sin cadena y sistema");
            $results = ReporteFalla::where('estado','=', 'Aprobado')
            ->where('modelo', '=', $modeloBusqueda)
            ->where('marca', '=', $marcaBusqueda)
            ->get();
            return view('dashboard', compact('marcas','anos','results', 'alerta'));
        }
        if(is_null($cadenaBusqueda) and $modeloBusqueda == 'nulo' and $marcaBusqueda != 'nulo' and $sistemaBusqueda != 'nulo' ){
            error_log("Entro sin cadena y modelo");
            $results = ReporteFalla::where('estado','=', 'Aprobado')
            ->where('marca', '=', $marcaBusqueda)
            ->where('sistema_falla', '=', $sistemaBusqueda)
            ->get();
            return view('dashboard', compact('marcas', 'anos', 'results', 'alerta'));
        }

        if(is_null($cadenaBusqueda) and $modeloBusqueda == 'nulo' and $marcaBusqueda == 'nulo' and $sistemaBusqueda != 'nulo' ){
            error_log("Entro solo sistema");
            $results = ReporteFalla::where('estado','=', 'Aprobado')
            ->where('sistema_falla', '=', $sistemaBusqueda)
            ->get();
            return view('dashboard', compact('marcas', 'anos', 'results', 'alerta'));
        }

        if(is_null($cadenaBusqueda) and $modeloBusqueda == 'nulo' and $marcaBusqueda != 'nulo' and $sistemaBusqueda == 'nulo' ){
            error_log("Entro solo marca");
            $results = ReporteFalla::where('estado','=', 'Aprobado')
            ->where('marca', '=', $marcaBusqueda)
            ->get();
            return view('dashboard', compact('marcas', 'anos', 'results', 'alerta'));
        }
        if(is_null($cadenaBusqueda) and $modeloBusqueda != 'nulo' and $marcaBusqueda == 'nulo' and $sistemaBusqueda == 'nulo' ){
            error_log("Entro solo modelo");
            $results = ReporteFalla::where('estado','=', 'Aprobado')
            ->where('modelo', '=', $modeloBusqueda)
            ->get();
            return view('dashboard', compact('marcas', 'anos', 'results', 'alerta'));
        }

        if(!is_null($cadenaBusqueda) and $modeloBusqueda == 'nulo' and $marcaBusqueda == 'nulo' and $sistemaBusqueda == 'nulo' ){
            error_log("Entro solo cadena");
            $results = ReporteFalla::where('estado','=', 'Aprobado')
            ->Where('nombre_falla' , 'LIKE','%'.$cadenaBusqueda.'%')
            ->orWhere('descripcionusuario_falla' , 'LIKE','%'.$cadenaBusqueda.'%')
            ->orWhere('descripcion_reparacion','LIKE', '%'.$cadenaBusqueda.'%')
            ->get();
            return view('dashboard', compact('marcas', 'anos', 'results', 'alerta'));
        }
        
    }

}