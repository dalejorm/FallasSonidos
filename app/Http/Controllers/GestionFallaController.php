<?php

namespace App\Http\Controllers;

use App\Models\ReporteFalla;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReporteFallaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


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
        $fallas; 
        if($user->hasRole([0])){
            $fallas       = ReporteFalla::orderBy('nombre_falla', 'ASC')->paginate(10);        
        }
        if(!$user->hasRole([0])){
            $fallas       = ReporteFalla::where('id_user', '=',$user->id )->paginate(10);        
        }       
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
        
        if($user->hasRole([0])){
            $reportefalla->estado = "Aprobado";
        } else{
            $reportefalla->estado = "Pendiente aprobacion";
        }
        
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

    public function update(ReporteFallaRequest $request, ReporteFalla $gestionfalla){
        error_log($gestionfalla->gragacion_5);
        $user               = auth()->user(); 
        $gestionfalla->tipo_vehiculo = $request->get('tipo_vehiculo');
        $gestionfalla->linea = $request->get('linea');
        $gestionfalla->modelo = $request->get('modelo');
        $gestionfalla->Kilometraje = $request->get('Kilometraje');
        $gestionfalla->marca = $request->get('marca');
        $gestionfalla->cilindraje = $request->get('cilindraje');
        $gestionfalla->tipo_combustible = $request->get('tipo_combustible');
        $gestionfalla->transmision = $request->get('transmision');
        $gestionfalla->direccion = $request->get('direccion');
        $gestionfalla->descripcionusuario_falla = $request->get('descripcionusuario_falla');
        $gestionfalla->nombre_falla = $request->get('nombre_falla');
        $gestionfalla->diagnostico_falla = $request->get('diagnostico_falla');
        $gestionfalla->sistema_falla = $request->get('sistema_falla');
        if($gestionfalla->sistema_falla == "Suspensión"){
            $gestionfalla->tipo_sistema = $request->get('tipo_sistema2');
        }
        if($gestionfalla->sistema_falla == "Frenos"){
            $gestionfalla->tipo_sistema = $request->get('tipo_sistema1');
        }
        if($gestionfalla->sistema_falla == "Carrocería"){
            $gestionfalla->tipo_sistema = $request->get('tipo_sistema3');
        }        
        $gestionfalla->elemento_falla = $request->get('elemento_falla');
        $gestionfalla->descripcion_reparacion = $request->get('descripcion_reparacion');
        $gestionfalla->ubicacion_grabacionprincipal = $request->get('ubicacion_grabacionprincipal');
        $gestionfalla->ubicacion_grabacion2 = $request->get('ubicacion_grabacion2');
        $gestionfalla->ubicacion_grabacion3 = $request->get('ubicacion_grabacion3');
        $gestionfalla->ubicacion_grabacion4 = $request->get('ubicacion_grabacion4');
        $gestionfalla->ubicacion_grabacion5 = $request->get('ubicacion_grabacion5');
        
        if($user->hasRole([0])){
            $gestionfalla->estado = "Aprobado";
        } else{
            $gestionfalla->estado = "Pendiente aprobacion";
        }
        
        //error_log($reportefalla);
        
        if($request->hasFile('gragacion_principal')){
            Storage::delete("public/$gestionfalla->gragacion_principal");
            $audio1= $request->file('gragacion_principal')->store('biblio_grabaciones','public');
            $gestionfalla->gragacion_principal = $audio1;
        }

        $audio2= $request->get('gragacion_2');
        if($request->hasFile('gragacion_2')){
            Storage::delete("public/$gestionfalla->gragacion_2");
            $audio2= $request->file('gragacion_2')->store('biblio_grabaciones','public');
            $gestionfalla->gragacion_2 = $audio2;
        }

        $audio3= $request->get('gragacion_3');
        if($request->hasFile('gragacion_3')){
            Storage::delete("public/$gestionfalla->gragacion_3");
            $audio3= $request->file('gragacion_3')->store('biblio_grabaciones','public');
            $gestionfalla->gragacion_3 = $audio3;
        }

        $audio4= $request->get('gragacion_4');
        if($request->hasFile('gragacion_4')){
            Storage::delete("public/$gestionfalla->gragacion_4");
            $audio4= $request->file('gragacion_4')->store('biblio_grabaciones','public');
            $gestionfalla->gragacion_4 = $audio4;
        }

        $audio5= $request->get('gragacion_5');
        if($request->hasFile('gragacion_5')){
            Storage::delete("public/$gestionfalla->gragacion_5");
            $audio5= $request->file('gragacion_5')->store('biblio_grabaciones','public');
            $gestionfalla->gragacion_5 = $audio5;
        }
        
        error_log("=======================================================================");
        error_log($gestionfalla->gragacion_5);

        if ($gestionfalla->save()) {
            return redirect()->route('gestion-fallas.index')->with('estado', "Se actualizo la información del registro" );
        } else {
            error_log('entro al error de almacenamiento');
            return redirect()->back()->with('estado', 'Hubo un error almacenando los cambios');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReporteFalla  $reportefalla
     * @return \Illuminate\Http\Response
     */
    public function edit(ReporteFalla $gestionfalla){
        $user = auth()->user(); 
        //error_log($user->id);
        //$reportefalla = ReporteFalla::where('id', '=',$falla)->first();
        $reportefalla = $gestionfalla;       
        return view('GestionFallas.edit', compact('reportefalla', 'user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(ReporteFalla $gestionfalla)
    {
        $user       = auth()->user();
        $reportefalla = $gestionfalla;
        return view('GestionFallas.show', compact('reportefalla','user'));
    }



}