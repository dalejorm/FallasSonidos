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

                            <div class="ml-2"> Acepto 
                                <a type="button"class="underline text-sm text-gray-600 hover:text-gray-900" data-te-toggle="modal" data-te-target="#exampleModal" data-te-ripple-initata-te-ripple-color="light">Politica de uso y tratamiento de datos</a>
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
    <x-footer />
</x-guest-layout>

<!-- Modal -->
<div
  data-te-modal-init
  class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
  id="exampleModal"
  tabindex="-1"
  aria-labelledby="exampleModalXlLabel"
  aria-hidden="true">
  <div
    data-te-modal-dialog-ref
    class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px] ">
    <div
      class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
      <div
        class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
        <!--Modal title-->
        <h5
          class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
          id="exampleModalLabel">
          Politicas de uso y tratamiento de datos
        </h5>
        <!--Close button-->
        <button
          type="button"
          class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
          data-te-modal-dismiss
          aria-label="Close">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="h-6 w-6">
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <!--Modal body-->
        <div class="relative overflow-y-auto p-4">
            <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose">
                <div id="accordionExample5">
                    <div class="rounded-t-lg border border-neutral-200 bg-white dark:border-neutral-600 dark:bg-neutral-800">
                        <h2 class="mb-0" id="headingOne5">
                            <button class="group relative flex w-full items-center rounded-t-[15px] border-0 bg-white px-5 py-4 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 dark:text-white [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400 dark:[&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(75,85,99)]" type="button" data-te-collapse-init data-te-target="#collapseOne5" aria-expanded="true" aria-controls="collapseOne5">Tratamiento de datos
                                <span class="-mr-1 ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:mr-0 group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"  class="h-6 w-6">
                                        <path stroke-linecap="round"stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </span>
                            </button>
                        </h2>
                        <div id="collapseOne5" class="!visible" data-te-collapse-item data-te-collapse-show aria-labelledby="headingOne5">
                            <div class="px-5 py-4">
                                <strong>This is the first item's accordion body.</strong> It is
                                shown by default, until the collapse plugin adds the appropriate
                                classes that we use to style each element. These classes control
                                the overall appearance, as well as the showing and hiding via CSS
                                transitions. You can modify any of this with custom CSS or
                                overriding our default variables. It's also worth noting that just
                                about any HTML can go within the <code>.accordion-body</code>,
                                though the transition does limit overflow.
                            </div>
                        </div>
                    </div>
                    <div
                        class="border border-t-0 border-neutral-200 bg-white dark:border-neutral-600 dark:bg-neutral-800">
                        <h2 class="mb-0" id="headingTwo5">
                        <button class="group relative flex w-full items-center rounded-none border-0 bg-white px-5 py-4 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 dark:text-white [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400 dark:[&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(75,85,99)]" type="button" data-te-collapse-init data-te-collapse-collapsed data-te-target="#collapseTwo5" aria-expanded="false" aria-controls="collapseTwo5"> Politica de uso
                            <span class="-mr-1 ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:mr-0 group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                            </span>
                        </button>
                        </h2>
                        <div id="collapseTwo5" class="!visible hidden" data-te-collapse-item aria-labelledby="headingTwo5">
                        <div class="px-5 py-4">
                            <strong>This is the second item's accordion body.</strong> It is
                            hidden by default, until the collapse plugin adds the appropriate
                            classes that we use to style each element. These classes control
                            the overall appearance, as well as the showing and hiding via CSS
                            transitions. You can modify any of this with custom CSS or
                            overriding our default variables. It's also worth noting that just
                            about any HTML can go within the <code>.accordion-body</code>,
                            though the transition does limit overflow.
                        </div>
                        </div>
                    </div>         
                </div>                                
            </div>
        </div>

      <!--Modal footer-->
      <div
        class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
        <button
          type="button"
          class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
          data-te-modal-dismiss
          data-te-ripple-init
          data-te-ripple-color="light">
          Cerrar
        </button>       
      </div>
    </div>
  </div>
</div>



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