<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReporteFallaRequest extends FormRequest
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

        error_log('ingreso request');

        if ($this->isMethod('PUT')) {
            return [                
                'tipo_vehiculo'=> 'required|string|max:191|min:4',
                'linea' => 'required|string|max:191|min:4',
                'modelo'=> 'required|string|max:191|min:4', 
                'Kilometraje'=> 'required|string|max:191|min:4',
                'marca'=> 'required|string|max:191|min:4',
                'cilindraje'=> 'required|string|max:191|min:4',
                'tipo_combustible'=> 'required|string|max:191|min:5',
                'transmision'=> 'required|string|max:191|min:5',
                'direccion'=> 'required|string|max:191|min:5',
                'descripcionusuario_falla' => 'required|string|max:5000|min:10',
                'nombre_falla'=> 'required|string|max:191|min:5',
                'diagnostico_falla' => 'required|string|max:5000|min:10',
                'sistema_falla'=> 'required|string|max:191|min:4',
                'elemento_falla'=> 'required|string|max:191|min:4',
                'descripcion_reparacion' => 'required|string|max:5000|min:10',
                'gragacion_principal' => 'mimes:mp3|max:1024',
                'ubicacion_grabacionprincipal'=> 'required|string|max:191|min:5',
            ];
        } else{        
        
            return [                
                'tipo_vehiculo'=> 'required|string|max:191|min:4',
                'linea' => 'required|string|max:191|min:4',
                'modelo'=> 'required|string|max:191|min:4', 
                'Kilometraje'=> 'required|string|max:191|min:4',
                'marca'=> 'required|string|max:191|min:4',
                'cilindraje'=> 'required|string|max:191|min:4',
                'tipo_combustible'=> 'required|string|max:191|min:5',
                'transmision'=> 'required|string|max:191|min:5',
                'direccion'=> 'required|string|max:191|min:5',
                'descripcionusuario_falla' => 'required|string|max:5000|min:10',
                'nombre_falla'=> 'required|string|max:191|min:5',
                'diagnostico_falla' => 'required|string|max:5000|min:10',
                'sistema_falla'=> 'required|string|max:191|min:4',
                'elemento_falla'=> 'required|string|max:191|min:4',
                'descripcion_reparacion' => 'required|string|max:5000|min:10',
                'gragacion_principal' => 'mimes:mp3|max:1024',
                'ubicacion_grabacionprincipal'=> 'required|string|max:191|min:5',
            ];
        }        

    }   

}
