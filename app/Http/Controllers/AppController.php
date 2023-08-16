<?php

namespace App\Http\Controllers;

use App\Models\Vehicles;
use App\Models\Anos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{

    /**
     * Show node dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $marcas = DB::table('vehicles')->orderBy('name', 'asc')->get();
        $anos =  DB::table('anos')->orderBy('name', 'desc')->get();

        return view('dashboard', compact('marcas','anos'));
    }

}