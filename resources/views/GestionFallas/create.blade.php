<x-app-layout>
    <x-slot name="header" >
        <div class="bg-white static p-8 mt-6 lg:mt-0 mx-6 rounded shadow  border-4 border-y-[#CDCDCD]">
        <h2 class="bg-white font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear registro de Falla y Ruido') }}
        </h2>        
        </div>
    </x-slot>
    <x-buttonGoBack />  
    <form action="{{ route('gestion-fallas.store') }}" method="POST" enctype="multipart/form-data" class="max-w-7xl  pb-6 lg:w-11/12  sm:w-full mx-auto ">
    @csrf
    <div id='recipients' class="static p-8 mt-6 mx-6 rounded shadow  bg-white">
        <h2 class="p-2 font-semibold text-xl text-gray-800 leading-tight">Datos del vehículo</h2>
        <div class="rounded-t-lg overflow-hidden border border-l border-r border-gray-400 flex justify-center p-8">
            
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Tipo vehiculo --}}   
                    <x-jet-label class="inline-block mb-4" for="tipo vehiculo" value="tipo vehiculo" /><span class="inline-block text-red-500">*</span>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="tipo_vehiculo" name="tipo_vehiculo" required>
                        <option value="Vehículo"{{ old('tipo_vehiculo') =='Vehículo' ? 'selected' : '' }}>Vehículo</option>
                        <option value="Camioneta" {{ old('tipo_vehiculo') == 'Camioneta' ? 'selected' : '' }}>Camioneta</option>
                        </select>                        
                    </div>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- linea --}}                    
                    <x-jet-label class="inline-block mb-4" for="linea" value="Linea" /><span class="inline-block text-red-500">*</span>
                    <x-jet-input id="linea" name="linea" class="block w-full" type="text" value="{{old('linea')}}" placeholder="Línea" data-error="" minlength="5" maxlength="190" required />
                    <x-jet-input-error for="linea" class="mt-2" />                    
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 ">
                    {{-- Modelo--}}                  
                    <x-jet-label class="inline-block mb-4 " for="modelo" value="modelo" />
                    <span class="inline-block text-red-500 ">*</span>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="modelo" name="modelo" required>
                        @foreach($anos as $ano)
                        <option value="{{$ano->name}}" {{ old('modelo') == $ano->name ? 'selected' : '' }}>{{$ano->name}}</option>
                        @endforeach
                        </select>                        
                    </div>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Kilometraje --}}                    
                    <x-jet-label class="inline-block mb-4" for="Kilometraje" value="Kilometraje" /><span class="inline-block text-red-500">*</span>
                    <x-jet-input id="Kilometraje" name="Kilometraje" class="block w-full" type="text" value="{{old('Kilometraje')}}" placeholder="Kilometraje" data-error="" minlength="4" maxlength="190" required />
                    <x-jet-input-error for="Kilometraje" class="mt-2" />                    
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Marca --}}                    
                    <x-jet-label class="inline-block mb-4" for="Marca" value="Marca" /><span class="inline-block text-red-500">*</span>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="marca" name="marca" required>
                        @foreach($marcas as $marca)
                        <option value="{{$marca->name}}" {{ old('marca') == $marca->name ? 'selected' : '' }}>{{$marca->name}}</option>
                        @endforeach
                        </select>                        
                    </div>
                </div>

                <div class="w-full md:w-1/2 px-3  mb-6 md:mb-0">
                {{-- cilindraje --}}                    
                    <x-jet-label class="inline-block mb-4" for="cilindraje" value="cilindraje" /><span class="inline-block text-red-500">*</span>
                    <x-jet-input id="cilindraje" name="cilindraje" class="block w-full" type="text" value="{{old('cilindraje')}}" placeholder="Cilindraje" data-error="" minlength="4" maxlength="190" required />
                    <x-jet-input-error for="cilindraje" class="mt-2" />  
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Tipo combustible --}}                    
                    <x-jet-label class="inline-block mb-4" for="Tipo combustible" value="Tipo combustible" /><span class="inline-block text-red-500">*</span>                    
                    <div class="relative">
                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="tipo_combustible" name="tipo_combustible" required>
                        <option value="Gasolina" {{ old('tipo_combustible') =='Gasolina' ? 'selected' : '' }}>Gasolina</option>
                        <option value="Diesel" {{ old('tipo_combustible') =='Diesel' ? 'selected' : '' }}>Diesel</option>
                        </select>                        
                    </div>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Transmisión--}}                    
                    <x-jet-label class="inline-block mb-4" for="Transmisión" value="Transmisión" /><span class="inline-block text-red-500">*</span>           
                    <div class="relative">
                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="transmision" name="transmision" required>
                        <option value="Manual" {{ old('transmision') =='Manual' ? 'selected' : '' }}>Manual</option>
                        <option value="Automatica" {{ old('transmision') =='Automatica' ? 'selected' : '' }}>Automatica</option>
                        </select>                        
                    </div>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                     {{-- Tipo de dirección--}}                    
                    <x-jet-label class="inline-block mb-4" for="Tipo de dirección" value="Tipo de dirección" /><span class="inline-block text-red-500">*</span>           
                    <div class="relative">
                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="direccion" name="direccion" required>
                        <option value="Mecánica" {{ old('direccion') =='Mecánica' ? 'selected' : '' }}>Mecánica</option>
                        <option value="Hidráulica" {{ old('direccion') =='Hidráulica' ? 'selected' : '' }}>Hidráulica</option>
                        <option value="Electro asistida" {{ old('direccion') =='Electro asistida' ? 'selected' : '' }}>Electro asistida</option>
                        </select>                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id='recipients' class="static p-8 mt-6 mx-6 rounded shadow  bg-white">
        <h2 class="p-2 font-semibold text-xl text-gray-800 leading-tight">Información de la falla</h2>                
        <div class="rounded-t-lg overflow-hidden border border-l border-r border-gray-400 flex justify-center p-8">                            
            <div class="flex flex-wrap -mx-3 mb-6">

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Nombre de la falla --}}                    
                    <x-jet-label class="inline-block mb-4" for="Nombre de la falla" value="Nombre de la falla" /><span class="inline-block text-red-500">*</span>
                    <x-jet-input id="nombre_falla" name="nombre_falla" class="block w-full" type="text" value="{{old('nombre_falla')}}" placeholder="Nombre de la falla" data-error="" minlength="5" maxlength="190" required />
                    <x-jet-input-error for="Nombre de la falla" class="mt-2" />                    
                </div>
                
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Descripción de la falla por parte del usuario --}}                    
                    <x-jet-label class="inline-block mb-4" for="descripcionusuario_falla" value="Descripción de la falla por parte del usuario" /><span class="inline-block text-red-500">*</span>
                    <x-jet-input id="descripcionusuario_falla" name="descripcionusuario_falla" class="block w-full" type="text" value="{{old('descripcionusuario_falla')}}" placeholder="Descripción de la falla por parte del usuario" data-error="" minlength="5" maxlength="190" required />
                    <x-jet-input-error for="descripcionusuario_falla" class="mt-2" />                    
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Diagnostico de la Falla --}}                    
                    <x-jet-label class="inline-block mb-4" for="diagnostico_falla" value="Diagnostico de la Falla" /><span class="inline-block text-red-500">*</span>
                    <x-jet-input id="diagnostico_falla" name="diagnostico_falla" class="block w-full" type="text" value="{{old('diagnostico_falla')}}"  placeholder="Diagnostico de la Falla" data-error="" minlength="5" maxlength="190" required />
                    <x-jet-input-error for="diagnostico_falla" class="mt-2" />                    
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Elemento que presento la falla --}}                    
                    <x-jet-label class="inline-block mb-4" for="elemento_falla" value="Elemento que presento la falla" /><span class="inline-block text-red-500">*</span>
                    <x-jet-input id="elemento_falla" name="elemento_falla" class="block w-full" type="text" value="{{old('elemento_falla')}}"  placeholder="Elemento que presento la falla" data-error="" minlength="5" maxlength="190" required />
                    <x-jet-input-error for="elemento_falla" class="mt-2" />                    
                </div>              

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Sistema de la falla--}}                    
                    <x-jet-label class="inline-block mb-4" for="SistemaFalla" value="Sistema de la falla" /><span class="inline-block text-red-500">*</span>           
                    <div class="relative">
                        <select id="SistemaFalla" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="sistema_falla" name="sistema_falla" required>
                        <option value="Frenos" {{ old('sistema_falla') =='Frenos' ? 'selected' : '' }}>Frenos</option>
                        <option value="Suspensión" {{ old('sistema_falla') =='Suspensión' ? 'selected' : '' }}>Suspensión</option>
                        <option value="Carrocería" {{ old('sistema_falla') =='Carrocería' ? 'selected' : '' }}>Carrocería</option>
                        <option value="Motor" {{ old('sistema_falla') =='Motor' ? 'selected' : '' }}>Motor</option>
                        <option value="Transmisión" {{ old('sistema_falla') =='Transmisión' ? 'selected' : '' }}>Transmisión</option>
                        </select>                        
                    </div>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0" id="tab-frenos">
                    
                        {{-- Sistema de frenos--}}                    
                        <x-jet-label class="inline-block mb-4" for="tipo_sistema1" value="Sistema de frenos" /><span class="inline-block text-red-500">*</span>           
                        <div class="relative">
                            <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="tipo_sistema1" name="tipo_sistema1" required>
                            <option value="Tambor" {{ old('tipo_sistema1') =='Tambor' ? 'selected' : '' }}>Tambor</option>
                            <option value="Disco" {{ old('tipo_sistema1') =='Disco' ? 'selected' : '' }}>Disco</option>
                            </select>          
                    </div>
                </div>

                <div class="hidden  md:w-1/2 mb-6 px-3 md:mb-0" id="tab-suspension">
                    <div class="w-full ">
                        {{-- Sistema de suspensión--}}                    
                        <x-jet-label class="inline-block mb-4" for="tipo_sistema2" value="Sistema de suspensión" /><span class="inline-block text-red-500">*</span>           
                         <div class="relative">
                            <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="tipo_sistema2" name="tipo_sistema2" required>
                            <option value="Independiente" {{ old('tipo_sistema2') =='Independiente' ? 'selected' : '' }}>Independiente</option>
                            <option value="Semi Independiente" {{ old('tipo_sistema2') =='Semi Independiente' ? 'selected' : '' }}>Semi Independiente</option>
                            <option value="Rígido" {{ old('tipo_sistema2') =='Rígido' ? 'selected' : '' }}>Rígido</option>
                            </select>                        
                        </div>
                    </div>
                </div>

                <div class="hidden md:w-1/2 mb-6 px-3 md:mb-0" id="tab-carroceria">
                    <div class="w-full">
                        {{-- Tipo de carroceria --}}                    
                        <x-jet-label class="inline-block mb-4" for="tipo_sistema3" value="Tipo de carroceria" /><span class="inline-block text-red-500">*</span>
                        <x-jet-input id="tipo_sistema3" name="tipo_sistema3" class="block w-full" type="text"  value="{{old('tipo_sistema3')}}" placeholder="tipo de carroceria" data-error="" minlength="5" maxlength="190" required />
                        <x-jet-input-error for="tipo_sistema3" class="mt-2" />                    
                    </div> 
                </div>

                <div class="hidden md:w-1/2 mb-6 px-3 md:mb-0" id="tab-motor">
                    <div class="w-full">
                        {{-- Tipo de Motor --}}                    
                        <x-jet-label class="inline-block mb-4" for="tipo_sistema4" value="Tipo de motor" /><span class="inline-block text-red-500">*</span>
                        <x-jet-input id="tipo_sistema4" name="tipo_sistema4" class="block w-full" type="text"  value="{{old('tipo_sistema4')}}" placeholder="Tipo de motor" data-error="" minlength="5" maxlength="190" required />
                        <x-jet-input-error for="tipo_sistema4" class="mt-2" />                    
                    </div> 
                </div>

                <div class="hidden  md:w-1/2 mb-6 px-3 md:mb-0" id="tab-transmision">
                    <div class="w-full ">
                        {{-- Sistema de suspensión--}}                    
                        <x-jet-label class="inline-block mb-4" for="tipo_sistema5" value="Sistema de transmisión" /><span class="inline-block text-red-500">*</span>           
                         <div class="relative">
                            <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="tipo_sistema5" name="tipo_sistema5" required>
                            <option value="Manual" {{ old('tipo_sistema5') =='Manual' ? 'selected' : '' }}>Manual</option>
                            <option value="Automatica" {{ old('tipo_sistem5') =='Automatica Independiente' ? 'selected' : '' }}>Automatica</option>
                            </select>                        
                        </div>
                    </div>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Descripción de la reparación --}}                    
                    <x-jet-label class="inline-block mb-4" for="descripcion_reparacion" value="Descripción de la reparación" /><span class="inline-block text-red-500">*</span>
                    <x-jet-input id="descripcion_reparacion" name="descripcion_reparacion" class="block w-full" value="{{old('descripcion_reparacion')}}" type="text" placeholder="Diagnostico de la Falla" data-error="" minlength="5" maxlength="190" required />
                    <x-jet-input-error for="descripcion_reparacion" class="mt-2" />                    
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Cargar grabación principal --}}                    
                    <x-jet-label class="inline-block mb-4" for="gragacion_principal" value="Cargar grabación principal" /><span class="inline-block text-red-500">*</span>
                    <input id="gragacion_principal" name="gragacion_principal" value="{{old('gragacion_principal')}}" class="block w-full appearance-none bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="file" accept=".mp3" />
                    <x-jet-input-error for="gragacion_principal" class="mt-2" />
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">MP3 (MAX. 2MB).</p>                    
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Lugar de grabación en el vehiculo --}}                    
                    <x-jet-label class="inline-block mb-4" for="ubicacion_grabacionprincipal" value="Lugar de grabación en el vehiculo" /><span class="inline-block text-red-500">*</span>
                    <x-jet-input id="ubicacion_grabacionprincipal" name="ubicacion_grabacionprincipal" value="{{old('ubicacion_grabacionprincipal')}}" class="block w-full" type="text"  placeholder="Lugar de grabación en el vehiculo" data-error="" minlength="5" maxlength="190" required />
                    <x-jet-input-error for="ubicacion_grabacionprincipal" class="mt-2" />                    
                </div>                 
            </div>                          
        </div>
    </div>

    <div id='recipients' class="static p-8 mt-6 mx-6 rounded shadow  bg-white">
        <h2 class="p-2 font-semibold text-xl text-gray-800 leading-tight">Grabaciones extras</h2>   
        <div class="rounded-t-lg overflow-hidden border border-l border-r border-gray-400 flex justify-center p-8"> 
                         
           <div class="flex flex-wrap -mx-3 mb-6">

               <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Cargar grabación #2 --}}                    
                    <x-jet-label class="inline-block mb-4" for="gragacion_2" value="Cargar grabación #2" /><span class="inline-block text-red-500"></span>
                    <x-jet-input id="gragacion_2" name="gragacion_2" class="block w-full" value="{{old('gragacion_2')}}" type="file" accept=".mp3"  />
                    <x-jet-input-error for="gragacion_2" class="mt-2" />
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">MP3 (MAX. 2MB).</p>                    
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Lugar de grabación #2 en el vehiculo --}}                    
                    <x-jet-label class="inline-block mb-4" for="ubicacion_grabacion2" value="Lugar de grabación #2 en el vehiculo" /><span class="inline-block text-red-500"></span>
                    <x-jet-input id="ubicacion_grabacion2" name="ubicacion_grabacion2" class="block w-full" value="{{old('ubicacion_grabacion2')}}" type="text" placeholder="Lugar de grabación en el vehiculo" data-error="" minlength="5" maxlength="190"  />
                    <x-jet-input-error for="ubicacion_grabacion2" class="mt-2" />                    
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Cargar grabación #3 --}}                    
                    <x-jet-label class="inline-block mb-4" for="gragacion_3" value="Cargar grabación #3" /><span class="inline-block text-red-500"></span>
                    <x-jet-input id="gragacion_3" name="gragacion_3" class="block w-full" value="{{old('gragacion_3')}}" type="file" accept=".mp3"  />
                    <x-jet-input-error for="gragacion_3" class="mt-2" />
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">MP3 (MAX. 2MB).</p>                    
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Lugar de grabación #3 en el vehiculo --}}                    
                    <x-jet-label class="inline-block mb-4" for="ubicacion_grabacion3" value="Lugar de grabación #3 en el vehiculo" /><span class="inline-block text-red-500"></span>
                    <x-jet-input id="ubicacion_grabacion3" name="ubicacion_grabacion3" class="block w-full" type="text" value="{{old('ubicacion_grabacion3')}}" placeholder="Lugar de grabación en el vehiculo" data-error="" minlength="5" maxlength="190"  />
                    <x-jet-input-error for="ubicacion_grabacion3" class="mt-2" />                    
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Cargar grabación #4 --}}                    
                    <x-jet-label class="inline-block mb-4" for="gragacion_4" value="Cargar grabación #4" /><span class="inline-block text-red-500"></span>
                    <x-jet-input id="gragacion_4" name="gragacion_4" class="block w-full" value="{{old('gragacion_4')}}" type="file" accept=".mp3"  />
                    <x-jet-input-error for="gragacion_4" class="mt-2" />
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300"  id="file_input_help">MP3 (MAX. 2MB).</p>                    
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Lugar de grabación #4 en el vehiculo --}}                    
                    <x-jet-label class="inline-block mb-4" for="ubicacion_grabacion4" value="Lugar de grabación #4 en el vehiculo" /><span class="inline-block text-red-500"></span>
                    <x-jet-input id="ubicacion_grabacion4" name="ubicacion_grabacion4" class="block w-full" value="{{old('ubicacion_grabacion4')}}" type="text" placeholder="Lugar de grabación en el vehiculo" data-error="" minlength="5" maxlength="190"  />
                    <x-jet-input-error for="ubicacion_grabacion4" class="mt-2" />                    
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Cargar grabación #5 --}}                    
                    <x-jet-label class="inline-block mb-4" for="gragacion_5" value="Cargar grabación #5" /><span class="inline-block text-red-500"></span>
                    <x-jet-input id="gragacion_5" name="gragacion_5" class="block w-full" value="{{old('gragacion_5')}}" type="file" accept=".mp3"  />
                    <x-jet-input-error for="gragacion_5" class="mt-2" />
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">MP3 (MAX. 2MB).</p>                    
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    {{-- Lugar de grabación #5 en el vehiculo --}}                    
                    <x-jet-label class="inline-block mb-4" for="ubicacion_grabacion5" value="Lugar de grabación #5 en el vehiculo" /><span class="inline-block text-red-500"></span>
                    <x-jet-input id="ubicacion_grabacion5" name="ubicacion_grabacion5" class="block w-full" value="{{old('ubicacion_grabacion5')}}" type="text" placeholder="Lugar de grabación en el vehiculo" data-error="" minlength="5" maxlength="190"  />
                    <x-jet-input-error for="ubicacion_grabacion5" class="mt-2" />                    
                </div>
            </div>
        </div>
        <div class="grid px-3 justify-center">
            <div></div>
            <button class="mx-6 mt-6 bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                Crear nuevo registro de falla y ruido
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