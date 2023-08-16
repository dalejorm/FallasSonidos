<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buscador') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">   
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    
                    <div class="mt-8 text-2xl">
                        Bienvenido al buscador del Sistema de Gestión de Conocimiento de Fallas y Ruidos Vehículares!
                    </div>

                    <div class="mt-6 text-gray-500">
                        <div class="block m-5 object-center">
                            <form method="POST" action="">
                                @csrf
                                @method('POST')
                                <div class="max-w-full">
                                    <div class="ml-16 w-full">
                                        <input class="w-full appearance-none block bg-gray-100 text-gray-700 border border-blue-900 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" minlength="3" maxlength="50" id="txt-search" name="txt-search" type="text" pattern="[a-zA-Z0-9 ]{3,50}" title="Ingrese texto a buscar" placeholder="Buscar registro de falla y ruido" >
                                    </div>
                                    <div class="flex">
                                    {{-- Modelo --}}                    
                                        <x-jet-label class="mb-4 flex items-center" for="Modelo" value="Modelo:" />
                                        <div class="m-8 p-2 relative">
                                            <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="modelo" name="modelo" >
                                                <option value="" >Seleccione modelo</option>
                                                @foreach($anos as $ano)                                                
                                                <option value="{{$ano->name}}" {{ old('modelo') == $ano->name ? 'selected' : '' }}>{{$ano->name}}</option>
                                                @endforeach
                                            </select>                        
                                        </div>
                                        {{-- Marca --}}                    
                                        <x-jet-label class="mb-4 flex items-center" for="Marca" value="Marca:" />
                                        <div class="m-8 p-2 relative">
                                            <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="marca" name="marca" >
                                                <option value="" >Seleccione marca</option>
                                                @foreach($marcas as $marca)
                                                <option value="{{$marca->name}}" {{ old('marca') == $marca->name ? 'selected' : '' }}>{{$marca->name}}</option>
                                                @endforeach
                                            </select>                        
                                        </div>

                                        <x-jet-label class="mb-4 flex items-center" for="SistemaFalla" value="Sistema de la falla:" />        
                                        <div class="m-8 p-2 relative">
                                            <select id="SistemaFalla" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="sistema_falla" name="sistema_falla" >
                                            <option value="" >Seleccione sistema</option>
                                            <option value="Frenos" {{ old('sistema_falla') =='Frenos' ? 'selected' : '' }}>Frenos</option>
                                            <option value="Suspensión" {{ old('sistema_falla') =='Suspensión' ? 'selected' : '' }}>Suspensión</option>
                                            <option value="Carrocería" {{ old('sistema_falla') =='Carrocería' ? 'selected' : '' }}>Carrocería</option>
                                            <option value="Motor" {{ old('sistema_falla') =='Motor' ? 'selected' : '' }}>Motor</option>
                                            </select>                        
                                        </div>

                                        <div class="m-8 p-2">
                                        <button class="w-full bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded text-center">
                                            Buscar
                                        </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>
</x-app-layout>
