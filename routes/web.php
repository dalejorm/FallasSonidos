<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GestionUsuarioController;
use App\Http\Controllers\GestionFallaController;
use App\Http\Controllers\AprobacionFallaController;
use App\Http\Controllers\AppController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('terms', function () {
    return view('terms');
});

// rutas para acceder a gestion de usuarios
Route::resource('gestion-usuarios', GestionUsuarioController::class)->parameters(['gestion-usuarios' => 'gestion-usuario']);
// rutas para acceder a gestion de fallas
Route::resource('gestion-fallas', GestionFallaController::class)->parameters(['gestion-fallas' => 'gestionfalla']); 

Route::resource('aprobacion-fallas', AprobacionFallaController::class)->parameters(['aprobacion-fallas' => 'gestionfalla']); 

Route::get('/dashboard', [AppController::class, 'dashboard'])->name('dashboard');

Route::get('/busqueda', [AppController::class, 'busqueda'])->name('busqueda');

//Route::get('/busqueda', 'AppController@busqueda')->name('busqueda');

/*
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
*/
