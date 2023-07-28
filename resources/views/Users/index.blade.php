<title>Usuarios</title>
<x-app-layout>
    <x-slot name="header">
        <div class="col-start-2 col-span-4 md:col-start-1 md:col-span-3 xl:col-start-1 xl:col-span-3">
            <h2 class="font-display text-white text-center md:text-left text-2xl leading-9 font-semibold sm:text-3xl sm:leading-9">
                Usuarios
                <span class="text-base sm:text-2xl block text-purple-300">
                    Lista de todos los usuarios del sistema
                </span>
            </h2>
        </div>

        <a href="{{ route('users.create') }}">
            <div class="w-auto text-center text-base sm:w-auto items-center justify-center text-blue-900 group-hover:text-blue-500 font-medium leading-none bg-white rounded-lg shadow-sm group-hover:shadow-lg py-3 px-3 md:px-5 border border-transparent transform group-hover:-translate-y-0.5 transition-all duration-150">
                Crear usuario
            </div>
        </a>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg">
                <x-data-table>
                    <x-slot name="firstTheadTitle">
                        Nombre
                    </x-slot>
                    <x-slot name="secondTheadTitle">
                        Correo electrónico
                    </x-slot>
                    <x-slot name="thirdTheadTitle">
                        Número de celular
                    </x-slot>

                    <x-slot name="tbodyData">
                        @forelse ($users as $user)
                            <tr class="bg-white flex flex-col flex-no wrap lg:table-row mb-2 lg:mb-0">
                                <td>
                                    <span class="lg:hidden top-0 left-0 px-2 text-gray-400 py-1 text-xs font-bold uppercase block">Nombre</span>
                                    <p class="row-2">{{ $user->name }}</p>
                                </td>

                                <td>
                                    <span class="ml-2 lg:hidden top-0 left-0 px-2 text-gray-400 py-1 text-xs font-bold uppercase block">Correo electrónico</span>
                                    <p>{{ $user->email }}</p>
                                </td>

                                <td>
                                    <span class=" ml-2 lg:hidden top-0 left-0 px-2 text-gray-400 py-1 text-xs font-bold uppercase block">Número de celular</span>
                                    <p>{{ $user->numero_celular }}</p>
                                </td>

                                <td class="py-2 text-left">
                                    <div class="lg:flex items-center lg:justify-around">
                                        {{-- ICONOS SOLO VISIBLE EN MOVIL DE PANTALLA -> XS.. A.. MD --}}

                                        <div class="hidden lg:table-cell">
                                            <x-jet-dropdown align="right" width="48">
                                                <x-slot name="trigger">
                                                    <button class="flex items-center text-sm font-medium text-gray hover:text-blue-900 hover:border-gray-300 focus:outline-none focus:text-black focus:border-gray-300 transition duration-150 ease-in-out">
                                                        <div class="ml-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="fill-current h-4 w-4">
                                                                <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                                            </svg>
                                                        </div>
                                                    </button>
                                                </x-slot>

                                                <x-slot name="content">

                                                    <x-jet-dropdown-link href="{{ route('users.show', [$user]) }}">
                                                        {{ __('Show') }}
                                                    </x-jet-dropdown-link>

                                                    <x-jet-dropdown-link href="{{ route('users.edit', [$user]) }}">
                                                        {{ __('Edit') }}
                                                    </x-jet-dropdown-link>

                                                    <x-jet-dropdown-link class="modal-open hover:cursor-pointer" onclick="modal('{{ route('users.destroy', [$user]) }}')">
                                                        {{ __('Deactivate') }}
                                                    </x-jet-dropdown-link>

                                                </x-slot>
                                            </x-jet-dropdown>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <p class="p-4">{{ __('No data recorded') }}</p>
                                </td>
                            </tr>
                        @endforelse
                    </x-slot>
                </x-data-table>
            </div>
        </div>
    </div>

    {{-- #Component modal --}}
    <x-dialog-desactivate-user />

    {{-- Alert component --}}
    @if (session('estado'))
        <x-data-alert />
    @endif
</x-app-layout>
