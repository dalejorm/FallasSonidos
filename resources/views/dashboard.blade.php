<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            {{ __('Buscador') }}
        </h2>
    </x-slot>

    <div id="sectionBuscador"class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg"> 
            <x-welcome />  
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    
                    <div class="mt-8 text-2xl">
                        Buscador de fallas y ruidos
                    </div>

                    <div class="mt-6 text-gray-500">
                        <div class="block m-5 object-center">
                            <form method="GET" action="{{ route('busqueda') }}">                               
                                <div class="max-w-full">
                                    <div class="ml-16 w-full">
                                        <input class="w-full appearance-none block bg-gray-100 text-gray-700 border border-blue-900 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" minlength="3" maxlength="50" id="txt-search" name="txt-search" type="text" pattern="[^'\x22]+{3,50}" title="Ingrese texto a buscar" placeholder="Buscar registro de falla y ruido" >
                                    </div>
                                    <div class="flex">
                                    {{-- Modelo --}}                    
                                        <x-jet-label class="mb-4 flex items-center" for="Modelo" value="Modelo:" />
                                        <div class="m-8 p-2 relative">
                                            <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="modelo" name="modelo" >
                                                <option value="nulo" >Seleccione modelo</option>
                                                @foreach($anos as $ano)                                                
                                                <option value="{{$ano->name}}" {{ old('modelo') == $ano->name ? 'selected' : '' }}>{{$ano->name}}</option>
                                                @endforeach
                                            </select>                        
                                        </div>
                                        {{-- Marca --}}                    
                                        <x-jet-label class="mb-4 flex items-center" for="Marca" value="Marca:" />
                                        <div class="m-8 p-2 relative">
                                            <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="marca" name="marca" >
                                                <option value="nulo" >Seleccione marca</option>
                                                @foreach($marcas as $marca)
                                                <option value="{{$marca->name}}" {{ old('marca') == $marca->name ? 'selected' : '' }}>{{$marca->name}}</option>
                                                @endforeach
                                            </select>                        
                                        </div>

                                        <x-jet-label class="mb-4 flex items-center" for="SistemaFalla" value="Sistema de la falla:" />        
                                        <div class="m-8 p-2 relative">
                                            <select id="SistemaFalla" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="sistema_falla" name="sistema_falla" >
                                            <option value="nulo" >Seleccione sistema</option>
                                            <option value="Frenos" {{ old('sistema_falla') =='Frenos' ? 'selected' : '' }}>Frenos</option>
                                            <option value="Suspensión" {{ old('sistema_falla') =='Suspensión' ? 'selected' : '' }}>Suspensión</option>
                                            <option value="Carrocería" {{ old('sistema_falla') =='Carrocería' ? 'selected' : '' }}>Carrocería</option>
                                            <option value="Motor" {{ old('sistema_falla') =='Motor' ? 'selected' : '' }}>Motor</option>
                                            </select>                        
                                        </div>

                                        <div class="m-8 p-2">
                                        <button type="submit" class="w-full bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded text-center">
                                            Buscar
                                        </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
                    @forelse($results as $res)
                    <div class="p-6">
                        <div class="max-w-sm rounded overflow-hidden shadow-lg">
                            <div class="container min-w-100px w-auto max-w-900 mx-auto mt-20">
                                <div class="card flex flex-col items-center bg-gradient-to-r from-cyan-500 to-green-300 p-4 rounded-md text-black" >                               <div class="cover flex flex-col items-center min-w-80px w-auto max-w-880px">
                                <div class="font-bold text-xl mb-2"><a href="{{ route('gestion-fallas.show', [$res]) }}">{{$res->nombre_falla}}</a></div>
                                </div>
                                    <audio class="block w-full max-w-md mx-auto" controls>
                                        <source src="{{asset('storage') . '/' .  $res->gragacion_principal}}" type="audio/ogg">
                                    </audio>
                                </div>
                            </div>
                            <div class="px-6 py-4">
                                <p class="text-gray-700 text-base">
                                {{ substr($res->diagnostico_falla, 0, 150) }}@if (count_chars($res->diagnostico_falla) > 150)...@endif                                </p>
                            </div>
                            <div class="px-6 pt-4 pb-2">
                                <span class="inline-block bg-green-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{$res->modelo}}</span>
                                <span class="inline-block bg-rose-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{$res->marca}}</span>
                                <span class="inline-block bg-cyan-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{$res->sistema_falla}}</span>
                            </div>
                        </div>
                    </div>
                    
                    @empty
                    <div>No hay resultados de busqueda</div>
                    @endforelse
                  
                    

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
