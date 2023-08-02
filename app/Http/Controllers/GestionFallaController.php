<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ReporteFalla;
use App\Http\Requests\ReporteFallaRequest;
use App\Http\Controllers\NotificationController;
use Illuminate\Http\Request;

class GestionFallaController extends Controller
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
        $fallas       = ReporteFalla::orderBy('nombre_falla', 'ASC')->paginate(10);         

        return view('GestionFallas.index', compact('fallas','user'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$this->authorize('create_producto', Producto::class);

        $user       = auth()->user();
       // $empresa    = $user->empresa()->first();
        return view('GestionFallas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReporteFallaRequest $request)
    {
        $user               = auth()->user(); 
        error_log($user->id);
        error_log('paso el request');
        $reportefalla = new ReporteFalla();
        $reportefalla->id_user = $user->id;
        $reportefalla->tipo_vehiculo = $request->get('tipo_vehiculo');
        $reportefalla->linea = $request->get('linea');
        $reportefalla->modelo = $request->get('modelo');
        $reportefalla->Kilometraje = $request->get('Kilometraje');
        $reportefalla->marca = $request->get('marca');
        $reportefalla->cilindraje = $request->get('cilindraje');
        $reportefalla->tipo_combustible = $request->get('tipo_combustible');
        $reportefalla->transmision = $request->get('transmision');
        $reportefalla->direccion = $request->get('direccion');
        $reportefalla->descripcionusuario_falla = $request->get('descripcionusuario_falla');
        $reportefalla->nombre_falla = $request->get('nombre_falla');
        $reportefalla->diagnostico_falla = $request->get('diagnostico_falla');
        $reportefalla->sistema_falla = $request->get('sistema_falla');
        if($reportefalla->sistema_falla == "Suspensión"){
            $reportefalla->tipo_sistema = $request->get('tipo_sistema2');
        }
        if($reportefalla->sistema_falla == "Frenos"){
            $reportefalla->tipo_sistema = $request->get('tipo_sistema1');
        }
        if($reportefalla->sistema_falla == "Carrocería"){
            $reportefalla->tipo_sistema = $request->get('tipo_sistema3');
        }        
        $reportefalla->elemento_falla = $request->get('elemento_falla');
        $reportefalla->descripcion_reparacion = $request->get('descripcion_reparacion');
        $reportefalla->ubicacion_grabacionprincipal = $request->get('ubicacion_grabacionprincipal');
        $reportefalla->ubicacion_grabacion2 = $request->get('ubicacion_grabacion2');
        $reportefalla->ubicacion_grabacion3 = $request->get('ubicacion_grabacion3');
        $reportefalla->ubicacion_grabacion4 = $request->get('ubicacion_grabacion4');
        $reportefalla->ubicacion_grabacion5 = $request->get('ubicacion_grabacion5');
        $reportefalla->estado = "Pendiente aprobacion";
        //error_log($reportefalla);
        
        if($request->hasFile('gragacion_principal')){
            $audio1= $request->file('gragacion_principal')->store('biblio_grabaciones','public');
            $reportefalla->gragacion_principal = $audio1;
        }

        $audio2= $request->get('gragacion_2');
        if($request->hasFile('gragacion_2')){
            $audio2= $request->file('gragacion_2')->store('biblio_grabaciones','public');
            $reportefalla->gragacion_2 = $audio2;
        }

        $audio3= $request->get('gragacion_3');
        if($request->hasFile('gragacion_3')){
            $audio3= $request->file('gragacion_3')->store('biblio_grabaciones','public');
            $reportefalla->gragacion_3 = $audio3;
        }

        $audio4= $request->get('gragacion_4');
        if($request->hasFile('gragacion_4')){
            $audio4= $request->file('gragacion_4')->store('biblio_grabaciones','public');
            $reportefalla->gragacion_4 = $audio4;
        }

        $audio5= $request->get('gragacion_5');
        if($request->hasFile('gragacion_5')){
            $audio5= $request->file('gragacion_5')->store('biblio_grabaciones','public');
            $reportefalla->gragacion_5 = $audio5;
        }

        error_log($reportefalla);

        if ($reportefalla->save()) {
            return redirect()->route('gestion-fallas.index')->with('estado', 'Se registro la falla y el sonido correctamente');
        } else {
            error_log('entro al error de almacenamiento');
            return redirect()->back()->with('estado', 'Hubo un error almacenando el registro');
        }


        
        
        
        

    }

}