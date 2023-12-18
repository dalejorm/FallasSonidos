<x-app-layout>
    <x-slot name="header">
        <div class="bg-white static p-8 mt-6 lg:mt-0 mx-6 rounded shadow  border-4 border-y-[#CDCDCD]">
        <h2 class="bg-white font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Visualizar registro de Falla y Ruido') }}
        </h2>        
        </div>
        
    </x-slot>
    <x-buttonGoBack />
<div id='recipients' class="max-w-7xl w-11/12 pb-6 mx-auto static p-8 mt-6 rounded shadow bg-white ">
    <h2 class="p-2 font-semibold text-xl text-gray-800 leading-tight">Datos del vehículo</h2>
    <div class="rounded-t-lg overflow-hidden border border-l border-r border-gray-400 flex justify-center p-8">
        
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                {{-- Tipo vehiculo --}}   
                <x-jet-label class="inline-block mb-4" for="tipo vehiculo" value="tipo vehiculo" /><span class="inline-block text-red-500">:</span>
                <div class="relative">
                    <p class="text-2xl text-gray-700 py-3 px-4 pr-8">{{ $reportefalla->tipo_vehiculo }}</p>                                               
                </div>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                {{-- linea --}}                    
                <x-jet-label class="inline-block mb-4" for="linea" value="Linea" /><span class="inline-block text-red-500">:</span>
                <p class="text-2xl text-gray-700 py-3 px-4 pr-8">{{ $reportefalla->linea }}</p>                                           
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                {{-- Modelo --}}                    
                <x-jet-label class="inline-block mb-4" for="modelo" value="modelo" /><span class="inline-block text-red-500">:</span>
                <div class="relative">
                    <p class="text-2xl text-gray-700 py-3 px-4 pr-8">{{ $reportefalla->modelo }}</p>                                               
                </div>
            </div>

            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                {{-- Kilometraje --}}                    
                <x-jet-label class="inline-block mb-4" for="Kilometraje" value="Kilometraje" /><span class="inline-block text-red-500">:</span>
                <p class="text-2xl text-gray-700 py-3 px-4 pr-8">{{ $reportefalla->Kilometraje }}</p>                                        
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                {{-- Marca --}}                    
                <x-jet-label class="inline-block mb-4" for="Marca" value="Marca" /><span class="inline-block text-red-500">*</span>
                <div class="relative">
                    <p class="text-2xl text-gray-700 py-3 px-4 pr-8">{{ $reportefalla->marca }}</p>                                                
                </div>
            </div>

            <div class="w-full md:w-1/2 px-3  mb-6 md:mb-0">
            {{-- cilindraje --}}                    
                <x-jet-label class="inline-block mb-4" for="cilindraje" value="cilindraje" /><span class="inline-block text-red-500">:</span>
                <p class="text-2xl text-gray-700 py-3 px-4 pr-8">{{ $reportefalla->cilindraje }}</p>
            </div>

            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                {{-- Tipo combustible --}}                    
                <x-jet-label class="inline-block mb-4" for="Tipo combustible" value="Tipo combustible" /><span class="inline-block text-red-500">:</span>                    
                <div class="relative">
                    <p class="text-2xl text-gray-700 py-3 px-4 pr-8">{{ $reportefalla->tipo_combustible }}</p>                  
                </div>
            </div>

            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                {{-- Transmisión--}}                    
                <x-jet-label class="inline-block mb-4" for="Transmisión" value="Transmisión" /><span class="inline-block text-red-500">:</span>           
                <div class="relative">
                    <p class="text-2xl text-gray-700 py-3 px-4 pr-8">{{ $reportefalla->transmision }}</p>                
                </div>
            </div>

            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Tipo de dirección--}}                    
                <x-jet-label class="inline-block mb-4" for="Tipo de dirección" value="Tipo de dirección" /><span class="inline-block text-red-500">:</span>           
                <div class="relative">
                    <p class="text-2xl text-gray-700 py-3 px-4 pr-8">{{ $reportefalla->direccion }}</p>                       
                </div>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                {{-- codigo_VIN --}}                    
                <x-jet-label class="inline-block mb-4" for="codigo_vin" value="codigo_vin" /><span class="inline-block text-red-500">:</span>
                <p class="text-2xl text-gray-700 py-3 px-4 pr-8">{{ $reportefalla->codigo_vin }}</p>                                           
            </div>
        </div>
    </div>
</div>

<div id='recipients' class="max-w-7xl w-11/12 pb-6 mx-auto static p-8 mt-6 rounded shadow bg-white ">
    <h2 class="p-2 font-semibold text-xl text-gray-800 leading-tight">Información de la falla</h2>                
    <div class="rounded-t-lg overflow-hidden border border-l border-r border-gray-400 flex justify-center p-8">                            
        <div class="flex flex-wrap -mx-3 mb-6">

            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                {{-- Nombre de la falla --}}                    
                <x-jet-label class="inline-block mb-4" for="Nombre de la falla" value="Nombre de la falla" /><span class="inline-block text-red-500">:</span>
                <p class="text-2xl text-gray-700 py-3 px-4 pr-8">{{ $reportefalla->nombre_falla }}</p>          
            </div>
            
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                {{-- Descripción de la falla por parte del usuario --}}                    
                <x-jet-label class="inline-block mb-4" for="descripcionusuario_falla" value="Descripción de la falla por parte del usuario" /><span class="inline-block text-red-500">:</span>
                <p class="text-2xl text-gray-700 py-3 px-4 pr-8">{{ $reportefalla->descripcionusuario_falla }}</p>   
            </div>

            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                {{-- Diagnostico de la Falla --}}                    
                <x-jet-label class="inline-block mb-4" for="diagnostico_falla" value="Diagnostico de la Falla" /><span class="inline-block text-red-500">:</span>
                <p class="text-2xl text-gray-700 py-3 px-4 pr-8">{{ $reportefalla->diagnostico_falla }}</p>                  
            </div>

            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                {{-- Elemento que presento la falla --}}                    
                <x-jet-label class="inline-block mb-4" for="elemento_falla" value="Elemento que presento la falla" /><span class="inline-block text-red-500">:</span>
                <p class="text-2xl text-gray-700 py-3 px-4 pr-8">{{ $reportefalla->elemento_falla }}</p>     
            </div>              

            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                {{-- Sistema de la falla--}}                    
                <x-jet-label class="inline-block mb-4" for="SistemaFalla" value="Sistema de la falla" /><span class="inline-block text-red-500">:</span>           
                <div class="relative">
                    <p class="text-2xl text-gray-700 py-3 px-4 pr-8">{{ $reportefalla->sistema_falla }}</p>                    
                </div>
            </div>

            <div class="hidden" id="tab-frenos">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Sistema de frenos--}}                    
                    <x-jet-label class="inline-block mb-4" for="tipo_sistema1" value="Sistema de frenos" /><span class="inline-block text-red-500">:</span>           
                    <div class="relative">
                        <p class="text-2xl text-gray-700 py-3 px-4 pr-8">{{ $reportefalla->tipo_sistema }}</p>
                    </div>
                </div>
            </div>

            <div class="hidden" id="tab-suspension">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Sistema de suspensión--}}                    
                    <x-jet-label class="inline-block mb-4" for="tipo_sistema2" value="Sistema de suspensión" /><span class="inline-block text-red-500">:</span>           
                        <div class="relative">
                        <p class="text-2xl text-gray-700 py-3 px-4 pr-8">{{ $reportefalla->tipo_sistema }}</p>                       
                    </div>
                </div>
            </div>

            <div class="hidden" id="tab-carroceria">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Tipo de carroceria --}}                    
                    <x-jet-label class="inline-block mb-4" for="tipo_sistema3" value="Tipo de carroceria" /><span class="inline-block text-red-500">:</span>
                    <p class="text-2xl text-gray-700 py-3 px-4 pr-8">{{ $reportefalla->tipo_sistema }}</p>                 
                </div> 
            </div>

            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                {{-- Descripción de la reparación --}}                    
                <x-jet-label class="inline-block mb-4" for="descripcion_reparacion" value="Descripción de la reparación" /><span class="inline-block text-red-500">:</span>
                <p class="text-2xl text-gray-700 py-3 px-4 pr-8">{{ $reportefalla->descripcion_reparacion }}</p>        
            </div>

            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                {{-- Grabación principal actual--}}                    
                <x-jet-label class="inline-block mb-4" for="gragacion_principal" value="Grabación principal actual" /><span class="inline-block text-red-500">:</span>
                <audio controls>
                        <source src="{{asset('storage') . '/' .  $reportefalla->gragacion_principal}}" type="audio/ogg">
                </audio>
            </div>

            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                {{-- Lugar de grabación en el vehiculo --}}                    
                <x-jet-label class="inline-block mb-4" for="ubicacion_grabacionprincipal" value="Lugar de grabación en el vehiculo" /><span class="inline-block text-red-500">:</span>
                <p class="text-2xl text-gray-700 py-3 px-4 pr-8">{{ $reportefalla->ubicacion_grabacionprincipal }}</p>           
            </div>
            
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                {{-- Imagen de la pieza --}}
                <x-jet-label class="inline-block mb-4" for="imagen_pieza" value="Imagen de la pieza" /><span class="inline-block text-red-500">:</span>
                <img src="{{ asset('storage/' . $reportefalla->imagen_pieza) }}" alt="Imagen de la pieza">
            </div>
        </div>                          
    </div>
</div>

<div id='recipients' class="max-w-7xl w-11/12 pb-6 mx-auto static p-8 mt-6 rounded shadow bg-white ">
    <h2 class="p-2 font-semibold text-xl text-gray-800 leading-tight">Grabaciones extras</h2>   
    <div class="rounded-t-lg overflow-hidden border border-l border-r border-gray-400 flex justify-center p-8"> 
                        
        <div class="flex flex-wrap -mx-3 mb-6">
            @if($reportefalla->gragacion_2 != null)
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Grabación #2 actual--}}                    
                    <x-jet-label class="inline-block mb-4" for="gragacion_principal" value="Grabación #2 actual" /><span class="inline-block text-red-500">:</span>
                    <audio controls>
                        <source src="{{asset('storage') . '/' .  $reportefalla->gragacion_2}}" type="audio/ogg">
                    </audio>
                </div>
            @endif

            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                {{-- Lugar de grabación #2 en el vehiculo --}}                    
                <x-jet-label class="inline-block mb-4" for="ubicacion_grabacion2" value="Lugar de grabación #2 en el vehiculo" /><span class="inline-block text-red-500">:</span>
                <p class="text-2xl text-gray-700 py-3 px-4 pr-8">{{ $reportefalla->ubicacion_grabacion2 }}</p>               
            </div>
            @if($reportefalla->gragacion_3 != null)
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Grabación #3 actual--}}                    
                    <x-jet-label class="inline-block mb-4" for="gragacion_principal" value="Grabación #3 actual" /><span class="inline-block text-red-500">:</span>
                    <audio controls>
                        <source src="{{asset('storage') . '/' .  $reportefalla->gragacion_3}}" type="audio/ogg">
                    </audio>
                </div>
            @endif
            

            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                {{-- Lugar de grabación #3 en el vehiculo --}}                    
                <x-jet-label class="inline-block mb-4" for="ubicacion_grabacion3" value="Lugar de grabación #3 en el vehiculo" /><span class="inline-block text-red-500">:</span>
                <p class="text-2xl text-gray-700 py-3 px-4 pr-8">{{ $reportefalla->ubicacion_grabacion3 }}</p>                    
            </div>
            @if($reportefalla->gragacion_4 != null)
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Grabación #4 actual--}}                    
                    <x-jet-label class="inline-block mb-4" for="gragacion_principal" value="Grabación #4 actual" /><span class="inline-block text-red-500">:</span>
                    <audio controls>
                        <source src="{{asset('storage') . '/' .  $reportefalla->gragacion_4}}" type="audio/ogg">
                    </audio>
                </div>
            @endif

            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                {{-- Lugar de grabación #4 en el vehiculo --}}                    
                <x-jet-label class="inline-block mb-4" for="ubicacion_grabacion4" value="Lugar de grabación #4 en el vehiculo" /><span class="inline-block text-red-500">:</span>
                <p class="text-2xl text-gray-700 py-3 px-4 pr-8">{{ $reportefalla->ubicacion_grabacion4 }}</p>                     
            </div>
            @if($reportefalla->gragacion_5 != null)
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Grabación #5 actual--}}                    
                    <x-jet-label class="inline-block mb-4" for="gragacion_principal" value="Grabación #5 actual" /><span class="inline-block text-red-500">:</span>
                    <audio controls>
                        <source src="{{asset('storage') . '/' .  $reportefalla->gragacion_5}}" type="audio/ogg">
                    </audio>
                </div>
            @endif

            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                {{-- Lugar de grabación #5 en el vehiculo --}}                    
                <x-jet-label class="inline-block mb-4" for="ubicacion_grabacion5" value="Lugar de grabación #5 en el vehiculo" /><span class="inline-block text-red-500">:</span>
                <p class="text-2xl text-gray-700 py-3 px-4 pr-8">{{ $reportefalla->ubicacion_grabacion5 }}</p>                     
            </div>
            <div class="grid grid-cols-3 w-full md:w-1/2 px-3">
            @if($reportefalla->estado == "Pendiente aprobacion")
                @if($user->role == 1)
                <form action="{{ route('aprobacion-fallas.update', [$reportefalla]) }}" method="POST">
                @csrf
                @method('PUT')
                    <input hidden id="active" name="estado" type="text" value="Aprobar"/>
                    <button type="submit" class="mx-6 mt-6 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded text-center">
                        Aprobar
                    </button>
                </form>
                @endif
            @endif
                <div></div>
            @if($reportefalla->estado == "Pendiente aprobacion")
                @if($user->role == 1)
                <form action="{{ route('aprobacion-fallas.update', [$reportefalla]) }}" method="POST">
                @csrf
                @method('PUT')
                    <input hidden id="active" name="estado" type="text" value="Rechazar"/>
                    <button type="submit" class="mx-6 mt-6 bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded text-center">
                        Rechazar
                    </button>
                </form>
                @endif
            @endif

            @if($reportefalla->estado == "Pendiente eliminar")
                @if($user->role == 1)
                <form action="{{ route('aprobacion-fallas.update', [$reportefalla]) }}" method="POST">
                @csrf
                @method('PUT')
                    <input hidden id="active" name="estado" type="text" value="Autoasignar"/>
                    <button type="submit" class="mx-6 mt-6 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded text-center">
                    Autoasignar
                    </button>
                </form>
                @endif
            @endif
                <div></div>
            @if($reportefalla->estado == "Pendiente eliminar")
                @if($user->role == 1)
                <form action="{{ route('aprobacion-fallas.update', [$reportefalla]) }}" method="POST">
                @csrf
                @method('PUT')
                    <input hidden id="active" name="estado" type="text" value="Eliminar"/>
                    <button type="submit" class="mx-6 mt-6 bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded text-center">
                    Eliminar
                    </button>
                </form>
                @endif
            @endif
            </div>
        </div>
    </div>
</div> 
<br>
    {{-- Alert component --}}
    @if (session('estado'))
    <x-data-alert />
    @endif
</x-app-layout>
<script>
var bandera =null;
document.addEventListener("scroll", (event) => {
    if(bandera == null) {
        var selector  = document.getElementById("SistemaFalla");
        var valueSelector = selector.value; 
        if(valueSelector == "Frenos") {
            document.getElementById("tab-frenos").classList.remove("hidden");
            document.getElementById("tipo_sistema1").required = true; 
            document.getElementById("tab-suspension").classList.add("hidden");
            document.getElementById("tab-carroceria").classList.add("hidden");
            document.getElementById("tipo_sistema2").required = false; 
            document.getElementById("tipo_sistema3").required = false;                 
        }
        
        if(valueSelector == "Suspensión"){
            document.getElementById("tab-suspension").classList.remove("hidden"); 
            document.getElementById("tipo_sistema2").required = true; 
            document.getElementById("tab-frenos").classList.add("hidden");
            document.getElementById("tab-carroceria").classList.add("hidden");
            document.getElementById("tipo_sistema1").required = false; 
            document.getElementById("tipo_sistema3").required = false; 
        }

        if(valueSelector == "Carrocería"){
            document.getElementById("tab-carroceria").classList.remove("hidden"); 
            document.getElementById("tipo_sistema3").required = true; 
            document.getElementById("tab-frenos").classList.add("hidden");
            document.getElementById("tab-suspension").classList.add("hidden");
            document.getElementById("tipo_sistema2").required = false; 
            document.getElementById("tipo_sistema1").required = false;
        }
        bandera=100; 
    }
});

var selector  = document.getElementById("SistemaFalla");            
selector.addEventListener( 'change', () => {            
    var valueSelector = selector.value; 
    console.log("Ingreso al evento " + valueSelector );
    console.log(valueSelector);
    if(valueSelector == "Frenos") {
        console.log("Ingreso a frenos");
        document.getElementById("tab-frenos").classList.remove("hidden");
        document.getElementById("tipo_sistema1").required = true; 
        document.getElementById("tab-suspension").classList.add("hidden");
        document.getElementById("tab-carroceria").classList.add("hidden");
        document.getElementById("tipo_sistema2").required = false; 
        document.getElementById("tipo_sistema3").required = false;                 
    }
    
    if(valueSelector == "Suspensión"){
        console.log("Ingreso a suspension ");
        document.getElementById("tab-suspension").classList.remove("hidden"); 
        document.getElementById("tipo_sistema2").required = true; 
        document.getElementById("tab-frenos").classList.add("hidden");
        document.getElementById("tab-carroceria").classList.add("hidden");
        document.getElementById("tipo_sistema1").required = false; 
        document.getElementById("tipo_sistema3").required = false; 
    }

    if(valueSelector == "Carrocería"){
        console.log("Ingreso a carroceria ");
        document.getElementById("tab-carroceria").classList.remove("hidden"); 
        document.getElementById("tipo_sistema3").required = true; 
        document.getElementById("tab-frenos").classList.add("hidden");
        document.getElementById("tab-suspension").classList.add("hidden");
        document.getElementById("tipo_sistema2").required = false; 
        document.getElementById("tipo_sistema1").required = false;
    }
});            
</script>