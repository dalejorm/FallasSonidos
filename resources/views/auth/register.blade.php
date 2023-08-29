<!--<head>
<link
  href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"
  rel="stylesheet" />
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
<script src="https://cdn.tailwindcss.com/3.3.0"></script>
</head>-->

<x-guest-layout>
    <x-backgroundSup />
    <x-jet-authentication-card 
    class="pt-10">

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
                                <a type="button"class="underline text-sm text-gray-600 hover:text-gray-900" data-te-toggle="modal" data-te-target="#exampleModalLong" data-te-ripple-initata-te-ripple-color="light">Politica de uso y tratamiento de datos</a>
                            </div>
                            
                        </div>
                    </x-jet-label>
                </div>               
            @endif

            <div class="flex flex-col items-center justify-end mt-4">
                <a class="no-underline text-base text-[#36A9E1] hover:text-[#2F80ED] mb-2 pb-2"  href="{{ route('login') }}">
                    {{ __('¿Ya estas registrado?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Registrar') }}
                </x-jet-button>
            </div>
        </form>



    </x-jet-authentication-card>
    <x-backgroundInf />
    <x-footer />
</x-guest-layout>


<!-- Modal -->
<div
  data-te-modal-init
  class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
  id="exampleModalLong"
  tabindex="-1"
  aria-labelledby="exampleModalLongLabel"
  aria-hidden="true">
  <div
    data-te-modal-dialog-ref
    class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px] min-[992px]:max-w-[800px] min-[1200px]:max-w-[1140px]">
    <div
      class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
      <div
        class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
        <!--Modal title-->
        <h5
          class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
          id="exampleModalLongLabel">
          Tratamiento de datos y Politica de uso
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
    <div class="relative p-4" style="min-height: 1500px">
        <div id="accordionExample">
            <div class="rounded-t-lg border border-neutral-200 bg-white dark:border-neutral-600 dark:bg-neutral-800">
                <h2 class="mb-0" id="headingOne">
                    <button
                        class="group relative flex w-full items-center rounded-t-[15px] border-0 bg-white px-5 py-4 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 dark:text-white [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400 dark:[&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(75,85,99)]"
                        type="button"
                        data-te-collapse-init
                        data-te-target="#collapseOne"
                        aria-expanded="true"
                        aria-controls="collapseOne">
                        Tratamiento de datos
                        <span
                        class="ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
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
                            d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                        </span>
                    </button>
                </h2>
                <div id="collapseOne" class="!visible" data-te-collapse-item aria-labelledby="headingOne" data-te-parent="#accordionExample">
                    <div class="px-5 py-4">
                    Bienvenido(a) a Sistema de Gestion del Conocimiento de Fallas y Ruidos (SGCFR), operado por el <strong> Servicio 
                    Nacional de Aprensizajes (SENA)</strong>. Valoramos tu privacidad y nos comprometemos a proteger tus datos personales
                    de acuerdo con la normativa colombiana vigente, en especial con la Ley <code> 1581 de 2012 y el Decreto 1377 de 2013</code>, que 
                    regulan el tratamiento de datos personales.
                    </div>
                    <div class="px-5 py-4">
                    Al utilizar nuestros servicios y acceder a nuestro sistema, estás aceptando los términos de esta Política de Tratamiento de Datos
                    Personales. Te recomendamos leer detenidamente esta política antes de proporcionarnos cualquier información personal.
                    </div>
                    <div class="px-5 py-4">
                    <span><strong>1. Datos Personales que Recopilamos:</strong></span>
                    Recopilamos y tratamos diversos datos personales necesarios para brindarte nuestros servicios de manera efectiva. Esto puede incluir,
                    pero no se limita a: nombre, dirección de correo electrónico, número de teléfono, dirección postal y cualquier otro dato que proporciones voluntariamente.
                    </div>
                    <div class="px-5 py-4">
                    <span><strong>2. Finalidades del Tratamiento:</strong></span>
                    Los datos personales que recopilamos son utilizados con las siguientes finalidades:
                    <ul>
                    <li>Proveer los servicios que ofrecemos en nuestro sistema.</li>
                    <li>Mantener una comunicación efectiva contigo, como notificaciones, actualizaciones y asistencia.</li>
                    <li>Cumplir con obligaciones legales y reglamentarias.</li>
                    </ul>
                    </div>
                    <div class="px-5 py-4">
                    <span><strong>3. Transferencia y Compartición de Datos</strong></span>
                    Tus datos personales podrán ser compartidos con terceros únicamente cuando sea necesario para cumplir con nuestras obligaciones contractuales o legales,
                    o para mejorar la calidad de nuestros servicios. Nos aseguraremos de que estos terceros cumplan con los mismos estándares de privacidad y seguridad que mantenemos.
                    </div>
                    <div class="px-5 py-4">
                    <span><strong>4. Derechos de los Titulares de los Datos</strong></span>
                    Tienes derecho a conocer, actualizar y rectificar tus datos personales, así como a revocar el consentimiento otorgado para su tratamiento. También puedes solicitar 
                    la eliminación de tus datos en ciertas circunstancias. Para ejercer estos derechos o para resolver cualquier consulta sobre tus datos personales, puedes ponerte
                        en contacto con nosotros a través de los medios proporcionados al final de esta política.
                    </div>
                    <div class="px-5 py-4">
                    <span><strong>5. Seguridad de los Datos</strong></span>
                    Implementamos medidas de seguridad técnicas, administrativas y físicas para proteger tus datos personales contra el acceso no autorizado, la pérdida o la alteración.
                    Sin embargo, ten en cuenta que ningún método de transmisión por Internet o almacenamiento electrónico es totalmente seguro.
                    </div>
                    <div class="px-5 py-4">
                    <span><strong>6. Cambios a la Política de Tratamiento de Datos</strong></span>
                    Podemos modificar esta política ocasionalmente para reflejar cambios en nuestras prácticas de tratamiento de datos. Te recomendamos revisar esta política periódicamente 
                    para mantenerte informado(a) sobre cómo protegemos tu información personal.
                    </div>
                    <div class="px-5 py-4">
                    Al aceptar esta Política de Tratamiento de Datos Personales, estás otorgando tu consentimiento expreso para el tratamiento de tus datos personales según los términos descritos anteriormente.
                    </div>
                    <div class="px-5 py-4">
                    Si tienes preguntas o inquietudes sobre esta política o el tratamiento de tus datos personales, no dudes en ponerte en contacto con nosotros a través de los siguientes medios:
                    </div>
                    <div class="px-5 py-4">
                        <a href="mailto:{{ config('constantesV.EMAIL')}}">{{ config('constantesV.EMAIL')}}</a>
                    </div>
                    <div class="px-5 py-4">
                    <span>Fecha de última actualización: {{ config('constantesV.FECHA_POLITICAS')}}</span>
                    </div>
                    <div class="px-5 py-4">
                    Agradecemos tu confianza en SGCFR y en el SENA, esperamos brindarte una experiencia segura y satisfactoria en nuestro sistema.
                    </div>
                </div>
            </div>
            <div class="rounded-b-lg border border-t-0 border-neutral-200 bg-white dark:border-neutral-600 dark:bg-neutral-800">
                <h2 class="accordion-header mb-0" id="headingThree">
                    <button
                        class="group relative flex w-full items-center border-0 bg-white px-5 py-4 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 dark:text-white [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400 dark:[&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(75,85,99)] [&[data-te-collapse-collapsed]]:rounded-b-[15px] [&[data-te-collapse-collapsed]]:transition-none"
                        type="button"
                        data-te-collapse-init
                        data-te-collapse-collapsed
                        data-te-target="#collapseThree"
                        aria-expanded="false"
                        aria-controls="collapseThree">
                        Politica de uso
                        <span
                        class="-mr-1 ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:mr-0 group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
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
                            d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                        </span>
                    </button>
                </h2>
                <div
                id="collapseThree"
                class="!visible hidden"
                data-te-collapse-item
                aria-labelledby="headingThree"
                data-te-parent="#accordionExample">
                    <div class="px-5 py-4">
                        Bienvenido(a) a Sistema de Gestion del Conocimiento de Fallas y Ruidos (SGCFR), operado por el <strong> Servicio 
                        Nacional de Aprensizajes (SENA)</strong>. Esta Política de Uso establece las pautas y regulaciones para interactuar y 
                        utilizar sistema. Al acceder y utilizar este sitio, aceptas cumplir con los términos y condiciones establecidos en esta política.
                    </div>
                    <div class="px-5 py-4">
                        <span><strong>1. Uso Aceptable:</strong></span>
                        El uso de SGCFR está sujeto a las siguientes condiciones:
                        <ul>
                            <li>No utilizarás este sitio de ninguna manera que viole las leyes colombianas o internacionales aplicables.</li>
                            <li>No interferirás con el funcionamiento normal del sistema ni dañarás su infraestructura.</li>
                            <li>No publicarás, compartirás ni distribuirás contenido que sea ilegal, difamatorio, obsceno, ofensivo, fraudulento o que viole los derechos de terceros.</li>
                            <li>No intentarás obtener acceso no autorizado a áreas restringidas del sistema ni a la información de otros usuarios.</li>
                            <li>No utilizarás técnicas de extracción de datos, raspado web u otras formas de recopilación automatizada de información sin nuestro consentimiento.</li>
                        </ul>
                    </div>
                    <div class="px-5 py-4">
                        <span><strong>2. Contenido del Usuario</strong></span>
                        Si decides contribuir con contenido en el sistema, garantizas que tienes el derecho de hacerlo y que dicho contenido cumple con nuestras directrices
                        de uso aceptable. Nos reservamos el derecho de moderar, editar o eliminar contenido que consideremos inapropiado o que viole esta política. Tambien nos reservamos
                            el derecho de conservar información que no sea sensible y hubieses suministrado al sistema en caso de que solicites que sea eliminada.
                    </div>
                    <div class="px-5 py-4">
                        <span><strong>3. Propiedad Intelectual</strong></span>
                        Los derechos de propiedad intelectual, incluidos pero no limitados a derechos de autor, marcas registradas y patentes, relacionados con el contenido y el diseño del 
                        sistema, son propiedad exclusiva del SENA o de sus respectivos propietarios. No se otorga ninguna licencia ni derecho sobre estos activos a los usuarios del sistema.
                    </div>
                    <div class="px-5 py-4">
                        <span><strong>4. Enlaces a Terceros</strong></span>
                        Nuestro sistema puede contener enlaces a sitios de terceros. No somos responsables de la exactitud, seguridad o contenido de estos sitios. La inclusión de enlaces no implica un respaldo de su parte.
                    </div>
                    <div class="px-5 py-4">
                        <span><strong>5. Limitación de Responsabilidad</strong></span>
                        SGCFR se esfuerza por mantener la precisión y la disponibilidad del contenido en el sistema. Sin embargo, no garantizamos la exactitud, integridad o actualidad de la información presentada. El uso del sistema es bajo tu propio riesgo.   
                    </div>
                    <div class="px-5 py-4">
                        <span><strong>6. Cambios en la Política de Uso</strong></span>
                        Nos reservamos el derecho de actualizar y modificar esta Política de Uso en cualquier momento. Los cambios entrarán en vigencia tan pronto como se publiquen en el sistema. Te recomendamos revisar periódicamente esta política para estar al tanto de las condiciones actuales. 
                    </div>
                    <div class="px-5 py-4">
                        <span><strong>7. Contacto</strong></span>
                        Si tienes preguntas, comentarios o inquietudes sobre esta Política de Uso, no dudes en ponerte en contacto con nosotros a través de los siguientes medios:    
                    </div>
                    <div class="px-5 py-4">
                        <a href="mailto:{{ config('constantesV.EMAIL')}}">{{ config('constantesV.EMAIL')}}</a>
                    </div>
                    <div class="px-5 py-4">
                    Al utilizar SGCFR, reconoces que has leído, comprendido y aceptado los términos y condiciones establecidos en esta Política de Uso. Te agradecemos por tu respeto a estas regulaciones mientras disfrutas de nuestros servicios en línea.                            </div>
                    <div class="px-5 py-4">
                    <span>Fecha de última actualización: {{ config('constantesV.FECHA_POLITICAS')}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Modal footer-->
    <div class="-4 flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
        <button
        type="button"
        class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
        data-te-modal-dismiss
        data-te-ripple-init
        data-te-ripple-color="light">
        Close
        </button>
        </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
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