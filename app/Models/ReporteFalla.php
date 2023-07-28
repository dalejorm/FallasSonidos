<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'tipo_vehiculo',
        'linea',
        'modelo',
        'Kilometraje',
        'marca',
        'cilindraje',
        'tipo_combustible',
        'transmision',
        'direccion',
        'descripcionusuario_falla',
        'nombre_falla',
        'diagnostico_falla',
        'sistema_falla',
        'tipo_sistema',
        'elemento_falla',
        'descripcion_reparacion',
        'gragacion_principal',
        'ubicacion_grabacionprincipal',
        'gragacion_2',
        'ubicacion_grabacion2',
        'gragacion_3',
        'ubicacion_grabacion3',
        'gragacion_4',
        'ubicacion_grabacion4',
        'gragacion_5',
        'ubicacion_grabacion5',
        'estado',
    ];
    
}
