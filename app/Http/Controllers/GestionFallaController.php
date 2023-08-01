<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ReporteFalla;
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

       // $user               = auth()->user();       
        $fallas       = ReporteFalla::orderBy('name', 'ASC')->paginate(10);         

        return view('GestionFallas.index', compact('fallas'));
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

}