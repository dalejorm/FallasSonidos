<x-app-layout>
    <x-slot name="header">
        <h2
            class="bg-white grid grid-cols-2 content-around static p-8  rounded shadow font-semibold text-xl text-gray-800 leading-tight border-4 border-y-[#CDCDCD]">
            {{ __('Buscador') }}
        </h2>
    </x-slot>
    <div id="sectionBuscador"class="py-12">
        <div class="pt-6 max-w-7xl lg:w-11/12 mx-auto p-8 mt-6">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <!---->
                    <!---->
                    <div class="mt-8 text-2xl">
                        Buscador de fallas y ruidos
                    </div>

                    <div class="mt-6 text-gray-500">
                        <div class="block m-5 object-center">
                            <form method="GET" action="{{ route('busqueda') }}">
                                <div class="max-w-full">
                                    <div class="flex">
                                        <div class="flex-1 max-w-80">
                                            <input
                                                class="w-full rounded-l-full rounded-r-none appearance-none block bg-white text-gray-400  drop-shadow-xl rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white border-b-4 border-gray-500 hover:border-gray-500"
                                                minlength="3" maxlength="50" id="txt-search" name="txt-search"
                                                type="text" pattern="[a-zA-Z0-9 ]{3,50}"
                                                title="Ingrese texto a buscar"
                                                placeholder="Buscar registro de falla y ruido">
                                        </div>
                                        <div class="flex-1 max-w-20">
                                            <button type="submit"
                                                class="rounded-r-full rounded-l-none inline-flex items-center py-2.5 px-3 ml-1  bg-blue-500 hover:bg-blue-400 text-white font-bold border-b-4 border-blue-700 hover:border-blue-500 rounded drop-shadow-xl">
                                                <svg class="mr-2 -ml-1 w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                </svg>Buscar</button>
                                        </div>
                                    </div>

                                    <div class="flex flex-wrap">
                                        {{-- Modelo --}}
                                        <div class="w-full sm:w-1/2 md:w-1/3 mb-4 pr-0 sm:pr-4">
                                            <x-jet-label class="mb-4 flex items-center" for="Modelo"
                                                value="Modelo:" />
                                            <div class="mx-2 p-2 relative">
                                                <select
                                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                    id="modelo" name="modelo">
                                                    <option value="nulo">Seleccione modelo</option>
                                                    @foreach ($anos as $ano)
                                                        <option value="{{ $ano->name }}"
                                                            {{ old('modelo') == $ano->name ? 'selected' : '' }}>
                                                            {{ $ano->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        {{-- Marca --}}
                                        <div class="w-full sm:w-1/2 md:w-1/3 mb-4 pr-0 sm:pr-4">
                                            <x-jet-label class="mb-4 flex items-center" for="Marca" value="Marca:" />
                                            <div class="mx-2 p-2 relative">
                                                <select
                                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                    id="marca" name="marca">
                                                    <option value="nulo">Seleccione marca</option>
                                                    @foreach ($marcas as $marca)
                                                        <option value="{{ $marca->name }}"
                                                            {{ old('marca') == $marca->name ? 'selected' : '' }}>
                                                            {{ $marca->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="w-full sm:w-1/2 md:w-1/3 mb-4 pr-0 sm:pr-4">
                                            <x-jet-label class="mb-4 flex items-center" for="SistemaFalla"
                                                value="Sistema de la falla:" />
                                            <div class="mx-2 p-2 relative">
                                                <select id="SistemaFalla"
                                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                    id="sistema_falla" name="sistema_falla">
                                                    <option value="nulo">Seleccione sistema</option>
                                                    <option value="Frenos"
                                                        {{ old('sistema_falla') == 'Frenos' ? 'selected' : '' }}>Frenos
                                                    </option>
                                                    <option value="Suspensión"
                                                        {{ old('sistema_falla') == 'Suspensión' ? 'selected' : '' }}>
                                                        Suspensión</option>
                                                    <option value="Carrocería"
                                                        {{ old('sistema_falla') == 'Carrocería' ? 'selected' : '' }}>
                                                        Carrocería</option>
                                                    <option value="Motor"
                                                        {{ old('sistema_falla') == 'Motor' ? 'selected' : '' }}>Motor
                                                    </option>
                                                </select>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-300 bg-opacity-50 grid grid-cols-1 md:grid-cols-3">
                    @if (count($results) > 0)
                        <!-- Verifica si se encontraron resultados -->
                        @foreach ($results as $res)
                            <div class="p-6 ">
                                <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
                                    <div class="container min-w-100px w-auto max-w-900 mx-auto mt-20">
                                        <div
                                            class="card flex flex-col items-center bg-gradient-to-r from-[#36A9E1] from-10% via-white via-50% to-[#36A9E1] to-10%... p-4 rounded-md b-4 text-black ">
                                            <div class="cover flex flex-col items-center min-w-80px w-auto max-w-880px">
                                                <div class="font-bold text-xl mb-2"><a
                                                        href="{{ route('gestion-fallas.show', [$res]) }}">{{ $res->nombre_falla }}</a>
                                                </div>
                                            </div>
                                            <audio class="block w-full max-w-md mx-auto border-1 border-gray-400"
                                                controls>
                                                <source src="{{ asset('storage') . '/' . $res->gragacion_principal }}"
                                                    type="audio/ogg">
                                            </audio>
                                        </div>
                                    </div>
                                    <div class="px-6 py-4">
                                        <p class="text-gray-700 text-base">
                                            {{ substr($res->diagnostico_falla, 0, 150) }}@if (count_chars($res->diagnostico_falla) > 150)
                                                ...
                                            @endif
                                        </p>
                                    </div>
                                    <div class="px-6 pt-4 pb-2">
                                        <span
                                            class="inline-block bg-[#FBB06A] rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $res->modelo }}</span>
                                        <span
                                            class="inline-block bg-[#36A9E1] rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $res->marca }}</span>
                                        <span
                                            class="inline-block bg-gray-300 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $res->sistema_falla }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div>
                            No hay resultados de búsqueda
                        </div>
                    @endif

                    @if ($alerta == true && count($results) == 0)
                        <div>
                            <x-data-toast />
                        </div>
                    @endif




                </div>
            </div>
        </div>
    </div>
</x-app-layout>
