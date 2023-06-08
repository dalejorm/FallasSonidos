<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\TallerConcesionario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Notification;
//use App\Notifications\InformationNotification;
//use App\Notifications\NewUserBusiness;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {

        if(isset($input['role'])){
            if($input['role'] == "tc"){
                Validator::make($input, [
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'document_type'             => ['required', 'string', 'max:255'],
                    'document_number'           => ['required', 'integer', 'min:0','max:9999999999', 'unique:users'],
                    'cellphone_number'          => ['required', 'integer', 'min:0','max:9999999999'],
                    'password' => $this->passwordRules(),
                    'nit' => ['required', 'string', 'max:255'],
                    'direccion'          => ['required', 'string', 'max:255'],
                    'nametc'             => ['required', 'string', 'max:255'],
                    'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
                ])->validate();

            } else {
                Validator::make($input, [
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'document_type'             => ['required', 'string', 'max:255'],
                    'document_number'           => ['required', 'integer', 'min:0','max:9999999999', 'unique:users'],
                    'cellphone_number'          => ['required', 'integer', 'min:0','max:9999999999'],
                    'password' => $this->passwordRules(),
                    'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
                ])->validate();
            }
        } else {

            // cuando no se selecciono rol

        }         

        
        $user = new User();
        if(isset($input['role'])){
            $TallerConcesionario = new TallerConcesionario();
            if($input['role'] == "tc"){
                //Crear tallerConcesionario
                $TallerConcesionario->nit                = $input['nit'];
                $TallerConcesionario->name               = $input['nametc'];
                $TallerConcesionario->address            = $input['direccion'];
                $user->role = 4;
                $user->assignRole(4);

                //obtener id taller para FK de User
            if (TallerConcesionario::where('nit','=', $TallerConcesionario->nit)->exists()){
                $id_tc = TallerConcesionario::where('nit','=', $TallerConcesionario->nit)->first();
            } else {
                if($TallerConcesionario->save()){
                    $id_tc = TallerConcesionario::where('nit','=', $TallerConcesionario->nit)->first();
                }
            }
            $user->id_tc        = $id_tc->id;

            } else{                
                switch ($input['role']) {
                    case 'Ins':
                        $user->assignRole(1);
                        $user->role = 1;
                        break;
                    case 'Apr':
                        $user->assignRole(2);
                        $user->role = 2;
                        break;
                    case 'Inv':
                        $user->assignRole(3);
                        $user->role = 3;
                        break;
                }
            }
            
            //crear ususario
            $user->name               = $input['name'];
            $user->email              = $input['email'];
            $user->password           = Hash::make($input['password']);
            $user->active         = false;
            $user->document_type      = $input['document_type'];
            $user->document_number    = $input['document_number'];
            $user->cellphone_number   = $input['cellphone_number'];
            

            $user->save();

        }

        return $user;
    }
}
