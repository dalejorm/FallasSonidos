<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GestionUsuarioController;
use App\Http\Controllers\GestionFallaController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


// rutas para acceder a gestion de usuarios
Route::resource('gestion-usuarios', GestionUsuarioController::class)->parameters(['gestion-usuarios' => 'gestion-usuario']);
// rutas para acceder a gestion de fallas
Route::resource('gestion-fallas', GestionFallaController::class)->parameters(['gestion-fallas' => 'gestion-falla']); 

});
