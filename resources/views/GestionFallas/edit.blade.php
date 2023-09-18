<x-app-layout>
    <x-slot name="header">
        <div class="bg-white static p-8 mt-6 lg:mt-0 mx-6 rounded shadow  border-4 border-y-[#CDCDCD]">
        <h2 class="bg-white font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar registro de Falla y Ruido') }}
        </h2>        
        </div>
        
    </x-slot>

    <form action="{{ route('gestion-fallas.update', [$reportefalla]) }}" method="POST" enctype="multipart/form-data" class="max-w-7xl  pb-6 lg:w-11/12  sm:w-full sm:mx-auto ">
    @csrf
    @method('PUT')
    <div id='recipients' class="static p-8 mt-6 mx-6 lg:mx-6 bg-white">
        <h2 class="p-2 font-semibold text-xl text-gray-800 leading-tight">Datos del vehículo</h2>
        <div class="rounded-t-lg overflow-hidden border border-l border-r border-gray-400 flex justify-center p-8">
            
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Tipo vehiculo --}}   
                    <x-jet-label class="inline-block mb-4" for="tipo vehiculo" value="tipo vehiculo" /><span class="inline-block text-red-500">*</span>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="tipo_vehiculo" name="tipo_vehiculo" required>
                        <option value="Vehículo" {{ $reportefalla->tipo_vehiculo == 'Vehículo' ? 'selected' : '' }}>Vehículo</option>
                        <option value="Camioneta" {{ $reportefalla->tipo_vehiculo == 'Camioneta' ? 'selected' : '' }}>Camioneta</option>
                        </select>                        
                    </div>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- linea --}}                    
                    <x-jet-label class="inline-block mb-4" for="linea" value="Linea" /><span class="inline-block text-red-500">*</span>
                    <x-jet-input id="linea" name="linea" class="block w-full" value="{{ isset($reportefalla->linea) ? $reportefalla->linea : old('linea') }}" type="text" placeholder="Línea" data-error="" minlength="5" maxlength="190" required />
                    <x-jet-input-error for="linea" class="mt-2" />                    
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Modelo --}}                    
                    <x-jet-label class="inline-block mb-4" for="modelo" value="modelo" /><span class="inline-block text-red-500">*</span>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="modelo" name="modelo" required>
                        @foreach($anos as $ano)
                        <option value="{{$ano->name}}" {{ $reportefalla->modelo == $ano->name ? 'selected' : '' }}>{{$ano->name}}</option>
                        @endforeach
                        </select>                        
                    </div>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Kilometraje --}}                    
                    <x-jet-label class="inline-block mb-4" for="Kilometraje" value="Kilometraje" /><span class="inline-block text-red-500">*</span>
                    <x-jet-input id="Kilometraje" name="Kilometraje" value="{{ isset($reportefalla->Kilometraje) ? $reportefalla->Kilometraje : old('Kilometraje') }}" class="block w-full" type="text" placeholder="Kilometraje" data-error="" minlength="4" maxlength="190" required />
                    <x-jet-input-error for="Kilometraje" class="mt-2" />                    
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Marca --}}                    
                    <x-jet-label class="inline-block mb-4" for="Marca" value="Marca" /><span class="inline-block text-red-500">*</span>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="marca" name="marca" required>
                        @foreach($marcas as $marca)
                        <option value="{{$marca->name}}" {{ $reportefalla->marca == $marca->name ? 'selected' : '' }}>{{$marca->name}}</option>
                        @endforeach
                        </select>                        
                    </div>
                </div>

                <div class="w-full md:w-1/2 px-3  mb-6 md:mb-0">
                {{-- cilindraje --}}                    
                    <x-jet-label class="inline-block mb-4" for="cilindraje" value="cilindraje" /><span class="inline-block text-red-500">*</span>
                    <x-jet-input id="cilindraje" name="cilindraje" value="{{ isset($reportefalla->cilindraje) ? $reportefalla->cilindraje : old('cilindraje') }}" class="block w-full" type="text" placeholder="Cilindraje" data-error="" minlength="4" maxlength="190" required />
                    <x-jet-input-error for="cilindraje" class="mt-2" />  
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Tipo combustible --}}                    
                    <x-jet-label class="inline-block mb-4" for="Tipo combustible" value="Tipo combustible" /><span class="inline-block text-red-500">*</span>                    
                    <div class="relative">
                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="tipo_combustible" name="tipo_combustible" required>
                        <option value="Gasolina" {{ $reportefalla->tipo_combustible == 'Gasolina' ? 'selected' : '' }}>Gasolina</option>
                        <option value="Diesel" {{ $reportefalla->tipo_combustible == 'Diesel' ? 'selected' : '' }}>Diesel</option>
                        </select>                        
                    </div>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Transmisión--}}                    
                    <x-jet-label class="inline-block mb-4" for="Transmisión" value="Transmisión" /><span class="inline-block text-red-500">*</span>           
                    <div class="relative">
                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="transmision" name="transmision" required>
                        <option value="Manual" {{ $reportefalla->transmision == 'Manual' ? 'selected' : '' }}>Manual</option>
                        <option value="Automatica" {{ $reportefalla->transmision == 'Automatica' ? 'selected' : '' }}>Automatica</option>
                        </select>                        
                    </div>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                     {{-- Tipo de dirección--}}                    
                    <x-jet-label class="inline-block mb-4" for="Tipo de dirección" value="Tipo de dirección" /><span class="inline-block text-red-500">*</span>           
                    <div class="relative">
                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="direccion" name="direccion" required>
                        <option value="Mecánica" {{ $reportefalla->direccion == 'Mecánica' ? 'selected' : '' }}>Mecánica</option>
                        <option value="Hidráulica" {{ $reportefalla->direccion == 'Hidráulica' ? 'selected' : '' }}>Hidráulica</option>
                        <option value="Electro asistida" {{ $reportefalla->direccion == 'Electro asistida' ? 'selected' : '' }}>Electro asistida</option>
                        </select>                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id='recipients' class="static p-8 mt-6 mx-6 rounded shadow lg:mx-6  bg-white">
        <h2 class="p-2 font-semibold text-xl text-gray-800 leading-tight">Información de la falla</h2>                
        <div class="rounded-t-lg overflow-hidden border border-l border-r border-gray-400 flex justify-center p-8">                            
            <div class="flex flex-wrap -mx-3 mb-6">

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Nombre de la falla --}}                    
                    <x-jet-label class="inline-block mb-4" for="Nombre de la falla" value="Nombre de la falla" /><span class="inline-block text-red-500">*</span>
                    <x-jet-input id="nombre_falla" name="nombre_falla" value="{{ isset($reportefalla->nombre_falla) ? $reportefalla->nombre_falla : old('nombre_falla') }}" class="block w-full" type="text" placeholder="Nombre de la falla" data-error="" minlength="5" maxlength="190" required />
                    <x-jet-input-error for="Nombre de la falla" class="mt-2" />                    
                </div>
                
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Descripción de la falla por parte del usuario --}}                    
                    <x-jet-label class="inline-block mb-4" for="descripcionusuario_falla" value="Descripción de la falla por parte del usuario" /><span class="inline-block text-red-500">*</span>
                    <x-jet-input id="descripcionusuario_falla" name="descripcionusuario_falla" value="{{ isset($reportefalla->descripcionusuario_falla) ? $reportefalla->descripcionusuario_falla : old('descripcionusuario_falla') }}" class="block w-full" type="text" placeholder="Descripción de la falla por parte del usuario" data-error="" minlength="5" maxlength="190" required />
                    <x-jet-input-error for="descripcionusuario_falla" class="mt-2" />                    
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Diagnostico de la Falla --}}                    
                    <x-jet-label class="inline-block mb-4" for="diagnostico_falla" value="Diagnostico de la Falla" /><span class="inline-block text-red-500">*</span>
                    <x-jet-input id="diagnostico_falla" name="diagnostico_falla" value="{{ isset($reportefalla->diagnostico_falla) ? $reportefalla->diagnostico_falla : old('diagnostico_falla') }}" class="block w-full" type="text" placeholder="Diagnostico de la Falla" data-error="" minlength="5" maxlength="190" required />
                    <x-jet-input-error for="diagnostico_falla" class="mt-2" />                    
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Elemento que presento la falla --}}                    
                    <x-jet-label class="inline-block mb-4" for="elemento_falla" value="Elemento que presento la falla" /><span class="inline-block text-red-500">*</span>
                    <x-jet-input id="elemento_falla" name="elemento_falla" value="{{ isset($reportefalla->elemento_falla) ? $reportefalla->elemento_falla : old('elemento_falla') }}" class="block w-full" type="text" placeholder="Elemento que presento la falla" data-error="" minlength="5" maxlength="190" required />
                    <x-jet-input-error for="elemento_falla" class="mt-2" />                    
                </div>              

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Sistema de la falla--}}                    
                    <x-jet-label class="inline-block mb-4" for="SistemaFalla" value="Sistema de la falla" /><span class="inline-block text-red-500">*</span>           
                    <div class="relative">
                        <select id="SistemaFalla" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="sistema_falla" name="sistema_falla" required>
                        <option value="Frenos" {{ $reportefalla->sistema_falla == 'Frenos' ? 'selected' : '' }}>Frenos</option>
                        <option value="Suspensión" {{ $reportefalla->sistema_falla == 'Suspensión' ? 'selected' : '' }}>Suspensión</option>
                        <option value="Carrocería" {{ $reportefalla->sistema_falla == 'Carrocería'? 'selected' : '' }}>Carrocería</option>
                        <option value="Transmisión" {{ $reportefalla->sistema_falla == 'Transmisión'? 'selected' : '' }}>Transmisión</option>
                        </select>                        
                    </div>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0" id="tab-frenos">
                    
                        {{-- Sistema de frenos--}}         
                        <x-jet-label class="inline-block mb-4" for="tipo_sistema1" value="Sistema de frenos" /><span class="inline-block text-red-500">*</span>           
                        <div class="relative">
                            <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="tipo_sistema1" name="tipo_sistema1" required>
                            <option value="Tambor" {{ $reportefalla->tipo_sistema == 'Tambor' ? 'selected' : '' }}>Tambor</option>
                            <option value="Disco" {{ $reportefalla->tipo_sistema == 'Disco' ? 'selected' : '' }}>Disco</option>
                            </select>      
                        </div>
                </div>

                <div class="hidden" id="tab-suspension">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        {{-- Sistema de suspensión--}}                    
                        <x-jet-label class="inline-block mb-4" for="tipo_sistema2" value="Sistema de suspensión" /><span class="inline-block text-red-500">*</span>           
                         <div class="relative">
                            <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="tipo_sistema2" name="tipo_sistema2" required>
                            <option value="Independiente" {{ $reportefalla->tipo_sistema == 'Independiente' ? 'selected' : '' }}>Independiente</option>
                            <option value="Semi Independiente" {{ $reportefalla->tipo_sistema == 'Semi Independiente' ? 'selected' : '' }}>Semi Independiente</option>
                            <option value="Rígido" {{ $reportefalla->tipo_sistema == 'Rígido' ? 'selected' : '' }}>Rígido</option>
                            </select>                        
                        </div>
                    </div>
                </div>

                <div class="hidden" id="tab-carroceria">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        {{-- Tipo de carroceria --}}                    
                        <x-jet-label class="inline-block mb-4" for="tipo_sistema3" value="Tipo de carroceria" /><span class="inline-block text-red-500">*</span>
                        <x-jet-input id="tipo_sistema3" name="tipo_sistema3" value="{{ isset($reportefalla->tipo_sistema) ? $reportefalla->tipo_sistema : old('tipo_sistema3') }}" class="block w-full" type="text" placeholder="tipo de carroceria" data-error="" minlength="5" maxlength="190" required />
                        <x-jet-input-error for="tipo_sistema3" class="mt-2" />                    
                    </div> 
                </div>

                <div class="hidden md:w-1/2 mb-6 px-3 md:mb-0" id="tab-motor">
                    <div class="w-full">
                        {{-- Tipo de Motor --}}                    
                        <x-jet-label class="inline-block mb-4" for="tipo_sistema4" value="Tipo de motor" /><span class="inline-block text-red-500">*</span>
                        <x-jet-input id="tipo_sistema4" name="tipo_sistema4" class="block w-full" type="text"  value="{{ isset($reportefalla->tipo_sistema) ? $reportefalla->tipo_sistema : old('tipo_sistema4') }}" placeholder="Tipo de motor" data-error="" minlength="5" maxlength="190" required />
                        <x-jet-input-error for="tipo_sistema4" class="mt-2" />                    
                    </div> 
                </div>

                <div class="hidden  md:w-1/2 mb-6 px-3 md:mb-0" id="tab-transmision">
                    <div class="w-full ">
                        {{-- Sistema de suspensión--}}                    
                        <x-jet-label class="inline-block mb-4" for="tipo_sistema5" value="Sistema de transmisión" /><span class="inline-block text-red-500">*</span>           
                         <div class="relative">
                            <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="tipo_sistema5" name="tipo_sistema5" required>
                                <option value="Manual" {{ $reportefalla->tipo_sistema == 'Manual' ? 'selected' : '' }}>Manual</option>
                                <option value="Automatica" {{ $reportefalla->tipo_sistema == 'Automatica' ? 'selected' : '' }}>Automatica</option>
                            </select>                        
                        </div>
                    </div>
                </div>



                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Descripción de la reparación --}}                    
                    <x-jet-label class="inline-block mb-4" for="descripcion_reparacion" value="Descripción de la reparación" /><span class="inline-block text-red-500">*</span>
                    <x-jet-input id="descripcion_reparacion" value="{{ isset($reportefalla->descripcion_reparacion) ? $reportefalla->descripcion_reparacion : old('descripcion_reparacion') }}" name="descripcion_reparacion"  class="block w-full" type="text" placeholder="Diagnostico de la Falla" data-error="" minlength="5" maxlength="190" required />
                    <x-jet-input-error for="descripcion_reparacion" class="mt-2" />                    
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Grabación principal actual--}}                    
                    <x-jet-label class="inline-block mb-4" for="gragacion_principal" value="Grabación principal actual" /><span class="inline-block text-red-500">*</span>
                    <audio controls>
                           <source src="{{asset('storage') . '/' .  $reportefalla->gragacion_principal}}" type="audio/ogg">
                    </audio>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Cargar nueva grabación principal --}}                    
                    <x-jet-label class="inline-block mb-4" for="gragacion_principal" value="Cargar nueva grabación principal" /><span class="inline-block text-red-500">*</span>
                    <input id="gragacion_principal" name="gragacion_principal" class="block w-full" type="file" accept=".mp3" />
                    <x-jet-input-error for="gragacion_principal" class="mt-2" />
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">MP3 (MAX. 10MB).</p>                    
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Lugar de grabación en el vehiculo --}}                    
                    <x-jet-label class="inline-block mb-4" for="ubicacion_grabacionprincipal" value="Lugar de grabación en el vehiculo" /><span class="inline-block text-red-500">*</span>
                    <x-jet-input id="ubicacion_grabacionprincipal" value="{{ isset($reportefalla->ubicacion_grabacionprincipal) ? $reportefalla->ubicacion_grabacionprincipal : old('ubicacion_grabacionprincipal') }}" name="ubicacion_grabacionprincipal" class="block w-full" type="text"  placeholder="Lugar de grabación en el vehiculo" data-error="" minlength="5" maxlength="190" required />
                    <x-jet-input-error for="ubicacion_grabacionprincipal" class="mt-2" />                    
                </div>                 
            </div>                          
        </div>
    </div>

    <div id='recipients' class="static p-8 mt-6 mx-6 rounded shadow lg:mx-6 bg-white">
        <h2 class="p-2 font-semibold text-xl text-gray-800 leading-tight">Grabaciones extras</h2>   
        <div class="rounded-t-lg overflow-hidden border border-l border-r border-gray-400 flex justify-center p-8"> 
                         
           <div class="flex flex-wrap -mx-3 mb-6">
                @if($reportefalla->gragacion_2 != null)
                    <div class="w-full px-3 mb-6 md:mb-0">
                        {{-- Grabación #2 actual--}}                    
                        <x-jet-label class="inline-block mb-4" for="gragacion_principal" value="Grabación #2 actual" /><span class="inline-block text-red-500">*</span>
                        <audio controls>
                            <source src="{{asset('storage') . '/' .  $reportefalla->gragacion_2}}" type="audio/ogg">
                        </audio>
                    </div>
                @endif
               
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Cargar nueva grabación #2 --}}                    
                    <x-jet-label class="inline-block mb-4" for="gragacion_2" value="Cargar nueva grabación #2" /><span class="inline-block text-red-500"></span>
                    <x-jet-input id="gragacion_2" name="gragacion_2" class="block w-full" type="file" accept=".mp3"  />
                    <x-jet-input-error for="gragacion_2" class="mt-2" />
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">MP3 (MAX. 10MB).</p>                    
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Lugar de grabación #2 en el vehiculo --}}                    
                    <x-jet-label class="inline-block mb-4" for="ubicacion_grabacion2" value="Lugar de grabación #2 en el vehiculo" /><span class="inline-block text-red-500"></span>
                    <x-jet-input id="ubicacion_grabacion2" value="{{ isset($reportefalla->ubicacion_grabacion2) ? $reportefalla->ubicacion_grabacion2 : old('ubicacion_grabacion2') }}" name="ubicacion_grabacion2" class="block w-full" type="text" placeholder="Lugar de grabación en el vehiculo" data-error="" minlength="5" maxlength="190"  />
                    <x-jet-input-error for="ubicacion_grabacion2" class="mt-2" />                    
                </div>
                @if($reportefalla->gragacion_3 != null)
                    <div class="w-full  px-3 mb-6 md:mb-0">
                        {{-- Grabación #3 actual--}}                    
                        <x-jet-label class="inline-block mb-4" for="gragacion_principal" value="Grabación #3 actual" /><span class="inline-block text-red-500">*</span>
                        <audio controls>
                            <source src="{{asset('storage') . '/' .  $reportefalla->gragacion_3}}" type="audio/ogg">
                        </audio>
                    </div>
                @endif
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Cargar nueva grabación #3 --}}                    
                    <x-jet-label class="inline-block mb-4" for="gragacion_3" value="Cargar nueva grabación #3" /><span class="inline-block text-red-500"></span>
                    <x-jet-input id="gragacion_3" name="gragacion_3" class="block w-full" type="file" accept=".mp3"  />
                    <x-jet-input-error for="gragacion_3" class="mt-2" />
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">MP3 (MAX. 10MB).</p>                    
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Lugar de grabación #3 en el vehiculo --}}                    
                    <x-jet-label class="inline-block mb-4" for="ubicacion_grabacion3" value="Lugar de grabación #3 en el vehiculo" /><span class="inline-block text-red-500"></span>
                    <x-jet-input id="ubicacion_grabacion3" value="{{ isset($reportefalla->ubicacion_grabacion3) ? $reportefalla->ubicacion_grabacion3 : old('ubicacion_grabacion3') }}" name="ubicacion_grabacion3" class="block w-full" type="text" placeholder="Lugar de grabación en el vehiculo" data-error="" minlength="5" maxlength="190"  />
                    <x-jet-input-error for="ubicacion_grabacion3" class="mt-2" />                    
                </div>
                @if($reportefalla->gragacion_4 != null)
                    <div class="w-full px-3 mb-6 md:mb-0">
                        {{-- Grabación #4 actual--}}                    
                        <x-jet-label class="inline-block mb-4" for="gragacion_principal" value="Grabación #4 actual" /><span class="inline-block text-red-500">*</span>
                        <audio controls>
                            <source src="{{asset('storage') . '/' .  $reportefalla->gragacion_4}}" type="audio/ogg">
                        </audio>
                    </div>
                @endif
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Cargar nueva grabación #4 --}}                    
                    <x-jet-label class="inline-block mb-4" for="gragacion_4" value="Cargar nueva grabación #4" /><span class="inline-block text-red-500"></span>
                    <x-jet-input id="gragacion_4" name="gragacion_4" class="block w-full" type="file" accept=".mp3"  />
                    <x-jet-input-error for="gragacion_4" class="mt-2" />
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">MP3 (MAX. 10MB).</p>                    
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Lugar de grabación #4 en el vehiculo --}}                    
                    <x-jet-label class="inline-block mb-4" for="ubicacion_grabacion4" value="Lugar de grabación #4 en el vehiculo" /><span class="inline-block text-red-500"></span>
                    <x-jet-input id="ubicacion_grabacion4" value="{{ isset($reportefalla->ubicacion_grabacion4) ? $reportefalla->ubicacion_grabacion4 : old('ubicacion_grabacion4') }}" name="ubicacion_grabacion4" class="block w-full" type="text" placeholder="Lugar de grabación en el vehiculo" data-error="" minlength="5" maxlength="190"  />
                    <x-jet-input-error for="ubicacion_grabacion4" class="mt-2" />                    
                </div>
                @if($reportefalla->gragacion_5 != null)
                    <div class="w-full px-3 mb-6 md:mb-0">
                        {{-- Grabación #5 actual--}}                    
                        <x-jet-label class="inline-block mb-4" for="gragacion_principal" value="Grabación #5 actual" /><span class="inline-block text-red-500">*</span>
                        <audio controls>
                            <source src="{{asset('storage') . '/' .  $reportefalla->gragacion_5}}" type="audio/ogg">
                        </audio>
                    </div>
                @endif
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Cargar nueva grabación #5 --}}                    
                    <x-jet-label class="inline-block mb-4" for="gragacion_5" value="Cargar nueva grabación #5" /><span class="inline-block text-red-500"></span>
                    <x-jet-input id="gragacion_5" name="gragacion_5" class="block w-full" type="file" accept=".mp3"  />
                    <x-jet-input-error for="gragacion_5" class="mt-2" />
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">MP3 (MAX. 10MB).</p>                    
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Lugar de grabación #5 en el vehiculo --}}                    
                    <x-jet-label class="inline-block mb-4" for="ubicacion_grabacion5" value="Lugar de grabación #5 en el vehiculo" /><span class="inline-block text-red-500"></span>
                    <x-jet-input id="ubicacion_grabacion5" value="{{ isset($reportefalla->ubicacion_grabacion5) ? $reportefalla->ubicacion_grabacion5 : old('ubicacion_grabacion5') }}" name="ubicacion_grabacion5" class="block w-full" type="text" placeholder="Lugar de grabación en el vehiculo" data-error="" minlength="5" maxlength="190"  />
                    <x-jet-input-error for="ubicacion_grabacion5" class="mt-2" />                    
                </div>
            </div>
        </div>
        <div class="grid px-3 justify-center">
            <div></div>
            <button class="mx-6 mt-6 bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                Guardar cambios de registro de falla y ruido
            </button>
            <div></div>
        </div>
    </div>      
    
</form>

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
            document.getElementById("tab-transmision").classList.add("hidden");
            document.getElementById("tab-motor").classList.add("hidden");
            document.getElementById("tipo_sistema2").required = false; 
            document.getElementById("tipo_sistema3").required = false;    
            document.getElementById("tipo_sistema4").required = false;
            document.getElementById("tipo_sistema5").required = false;              
        }
        
        if(valueSelector == "Suspensión"){
            document.getElementById("tab-suspension").classList.remove("hidden"); 
            document.getElementById("tipo_sistema2").required = true; 
            document.getElementById("tab-frenos").classList.add("hidden");
            document.getElementById("tab-carroceria").classList.add("hidden");
            document.getElementById("tab-motor").classList.add("hidden");
            document.getElementById("tab-transmision").classList.add("hidden");
            document.getElementById("tipo_sistema1").required = false; 
            document.getElementById("tipo_sistema3").required = false;
            document.getElementById("tipo_sistema4").required = false;
            document.getElementById("tipo_sistema5").required = false; 
        }

        if(valueSelector == "Carrocería"){
            document.getElementById("tab-carroceria").classList.remove("hidden"); 
            document.getElementById("tipo_sistema3").required = true; 
            document.getElementById("tab-frenos").classList.add("hidden");
            document.getElementById("tab-suspension").classList.add("hidden");
            document.getElementById("tab-motor").classList.add("hidden");
            document.getElementById("tab-transmision").classList.add("hidden");
            document.getElementById("tipo_sistema2").required = false; 
            document.getElementById("tipo_sistema1").required = false;
            document.getElementById("tipo_sistema4").required = false;
            document.getElementById("tipo_sistema5").required = false;
        }
        if(valueSelector == "Motor"){
            document.getElementById("tab-Motor").classList.remove("hidden"); 
            document.getElementById("tipo_sistema4").required = true; 
            document.getElementById("tab-frenos").classList.add("hidden");
            document.getElementById("tab-suspension").classList.add("hidden");
            document.getElementById("tab-carroceria").classList.add("hidden");
            document.getElementById("tab-transmision").classList.add("hidden");
            document.getElementById("tipo_sistema2").required = false; 
            document.getElementById("tipo_sistema1").required = false;
            document.getElementById("tipo_sistema3").required = false;
            document.getElementById("tipo_sistema5").required = false;
        }
        if(valueSelector == "Transmisión"){
            document.getElementById("tab-transmision").classList.remove("hidden"); 
            document.getElementById("tipo_sistema5").required = true; 
            document.getElementById("tab-frenos").classList.add("hidden");
            document.getElementById("tab-suspension").classList.add("hidden");
            document.getElementById("tab-carroceria").classList.add("hidden");
            document.getElementById("tab-Motor").classList.add("hidden");
            document.getElementById("tipo_sistema2").required = false; 
            document.getElementById("tipo_sistema1").required = false;
            document.getElementById("tipo_sistema3").required = false;
            document.getElementById("tipo_sistema4").required = false;
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
            document.getElementById("tab-frenos").classList.remove("hidden");
            document.getElementById("tipo_sistema1").required = true; 
            document.getElementById("tab-suspension").classList.add("hidden");
            document.getElementById("tab-carroceria").classList.add("hidden");
            document.getElementById("tab-motor").classList.add("hidden");
            document.getElementById("tab-transmision").classList.add("hidden");
            document.getElementById("tipo_sistema2").required = false; 
            document.getElementById("tipo_sistema3").required = false;    
            document.getElementById("tipo_sistema4").required = false; 
            document.getElementById("tipo_sistema5").required = false;             
        }
        
        if(valueSelector == "Suspensión"){
            document.getElementById("tab-suspension").classList.remove("hidden"); 
            document.getElementById("tipo_sistema2").required = true; 
            document.getElementById("tab-frenos").classList.add("hidden");
            document.getElementById("tab-carroceria").classList.add("hidden");
            document.getElementById("tab-motor").classList.add("hidden");
            document.getElementById("tab-transmision").classList.add("hidden");
            document.getElementById("tipo_sistema1").required = false; 
            document.getElementById("tipo_sistema3").required = false;
            document.getElementById("tipo_sistema4").required = false; 
            document.getElementById("tipo_sistema5").required = false;
        }

        if(valueSelector == "Carrocería"){
            document.getElementById("tab-carroceria").classList.remove("hidden"); 
            document.getElementById("tipo_sistema3").required = true; 
            document.getElementById("tab-frenos").classList.add("hidden");
            document.getElementById("tab-suspension").classList.add("hidden");
            document.getElementById("tab-motor").classList.add("hidden");
            document.getElementById("tab-transmision").classList.add("hidden");
            document.getElementById("tipo_sistema2").required = false; 
            document.getElementById("tipo_sistema1").required = false;
            document.getElementById("tipo_sistema4").required = false;
            document.getElementById("tipo_sistema5").required = false;
        }
        if(valueSelector == "Motor"){
            document.getElementById("tab-motor").classList.remove("hidden"); 
            document.getElementById("tipo_sistema4").required = true; 
            document.getElementById("tab-frenos").classList.add("hidden");
            document.getElementById("tab-suspension").classList.add("hidden");
            document.getElementById("tab-carroceria").classList.add("hidden");
            document.getElementById("tab-transmision").classList.add("hidden");
            document.getElementById("tipo_sistema2").required = false; 
            document.getElementById("tipo_sistema1").required = false;
            document.getElementById("tipo_sistema3").required = false;
            document.getElementById("tipo_sistema5").required = false;
        }
        if(valueSelector == "Transmisión"){
            document.getElementById("tab-transmision").classList.remove("hidden"); 
            document.getElementById("tipo_sistema5").required = true; 
            document.getElementById("tab-frenos").classList.add("hidden");
            document.getElementById("tab-suspension").classList.add("hidden");
            document.getElementById("tab-carroceria").classList.add("hidden");
            document.getElementById("tab-Motor").classList.add("hidden");
            document.getElementById("tipo_sistema2").required = false; 
            document.getElementById("tipo_sistema1").required = false;
            document.getElementById("tipo_sistema3").required = false;
            document.getElementById("tipo_sistema4").required = false;
        }
    });           
</script>