<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return boolean
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()    {
        
            return [                
                'tipo_vehiculo'=> 'required|string|max:191|min:5',
                'linea' => 'required|string|max:191|min:5',
                'modelo'=> 'required|string|max:191|min:5', 
                'Kilometraje'=> 'required|string|max:191|min:5',
                'marca'=> 'required|string|max:191|min:5',
                'cilindraje'=> 'required|string|max:191|min:5',
                'tipo_combustible'=> 'required|string|max:191|min:5',
                'transmision'=> 'required|string|max:191|min:5',
                'direccion'=> 'required|string|max:191|min:5',
                'descripcionusuario_falla' => 'required|string|max:5000|min:10',
                'nombre_falla'=> 'required|string|max:191|min:5',
                'diagnostico_falla' => 'required|string|max:5000|min:10',
                'sistema_falla'=> 'required|string|max:191|min:5',
                'tipo_sistema'=> 'required|string|max:191|min:5',
                'elemento_falla'=> 'required|string|max:191|min:5',
                'descripcion_reparacion' => 'required|string|max:5000|min:10',
                'gragacion_principal' => 'mimes:mp3|max:1024',
                'ubicacion_grabacionprincipal'=> 'required|string|max:191|min:5',
                'gragacion_2' => 'mimes:mp3|max:1024',
                'ubicacion_grabacion2'=> 'required|string|max:191|min:5',
                'gragacion_3' => 'mimes:mp3|max:1024',
                'ubicacion_grabacion3'=> 'required|string|max:191|min:5',
                'gragacion_4' => 'mimes:mp3|max:1024',
                'ubicacion_grabacion4'=> 'required|string|max:191|min:5',
                'gragacion_5' => 'mimes:mp3|max:1024',
                'ubicacion_grabacion5' => 'required|string|max:191|min:5',
                'estado' => 'required|string|max:191|min:5',
            ];
        

    }   

}
