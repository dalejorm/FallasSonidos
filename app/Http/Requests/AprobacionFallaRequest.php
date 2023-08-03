<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AprobacionFallaRequest extends FormRequest
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

        error_log('ingreso request de aprobacion');

        if ($this->isMethod('PUT')) {
            return [                
                'estado'   => 'required|string|max:191|min:5'
            ];
        }       

    }   

}
