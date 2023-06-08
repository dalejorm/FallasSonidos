<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mt-4">
                <x-jet-label for="name" value="{{ __('Nombre') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label class="mb-4" for="document_type" value="{{ __('Tipo de documento') }}" />
                <select id="document_type" class="block mt-1 w-full" name="document_type" required>
                    <option value="">Seleccione un tipo de documento</option>
                    <option value="cc">Cédula de ciudadanía</option>
                    <option value="ti">Tarjeta de identidad</option>
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label class="mb-4" for="document_number" value="{{ __('Numero de documento') }}" />
                <x-jet-input id="document_number" class="block mt-1 w-full border" type="number" name="document_number" required />
            </div>

            <div>
                <x-jet-label for="cellphone_number" value="{{ __('Numero de celular') }}" />
                <x-jet-input id="cellphone_number" class="block mt-1 w-full" type="text" name="cellphone_number" :value="old('cellphone_number')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Correo electronico') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirma Contraseña') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label class="mb-4" for="role" value="{{ __('Rol del usuario') }}" />
                <select id="role" class="block mt-1 w-full" name="role" required>
                    <option value="" selected disabled hidden>Seleccione su rol</option>
                    <option value="tc">Taller/Concecionario</option>
                    <option value="Ins">Instructor</option>
                    <option value="Apr">Aprendiz</option>
                    <option value="Inv">Investigador</option>
                </select>
            </div>

            <div class="hidden mt-4" id="tab-business">
                <p class="mt-4 mb-4">{{ __('Datos del taller y/o concecionario') }}</p>                
                
                <div class="mt-4">
                    <x-jet-label for="nit" value="{{ __('NIT') }}" />
                    <x-jet-input id="nit" class="block mt-1 w-full" type="text" name="nit" type="text" minlength="9" data-error="" maxlength="9999999999" placeholder="8-0000000"  />
                </div>  

                <div class="mt-4">
                    <x-jet-label for="nametc" value="{{ __('Nombre Taller/Concesionario') }}" />
                    <x-jet-input id="nametc" class="block mt-1 w-full" type="text" name="nametc" :value="old('nametc')"  />
                </div>  
                
                <div class="mt-4">
                    <x-jet-label for="direccion" value="{{ __('Dirección') }}" />
                    <x-jet-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion')"   />
                </div>
                
            </div>
            
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature()) 
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('Acepto :terms_of_service', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Politica de uso y tratamiento de datos').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('¿Ya estas registrado?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Registrar') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>

<script> 
        var selector  = document.getElementById("role");            
        selector.addEventListener( 'change', () => {            
            var valueSelector = selector.value; 
            console.log("Ingreso al evento " + valueSelector );
            console.log(valueSelector);
            if(valueSelector == "tc") {
                console.log("Ingreso al if");
                document.getElementById("tab-business").classList.remove("hidden");                
            }else if(valueSelector != "tc"){
                console.log("Ingreso al else ");
                document.getElementById("tab-business").classList.add("hidden");
            }
        });

            
</script>