<title>Crear usuario</title>
<x-app-layout>
    <x-slot name="header">
        <div class="col-start-2 col-span-4 md:col-start-1 md:col-span-3 xl:col-start-1 xl:col-span-3">
            <h2 class="font-display text-white text-center md:text-left text-2xl leading-9 font-semibold sm:text-3xl sm:leading-9">
                Usuarios
                <span class="text-base sm:text-2xl block text-purple-300">
                    <a class="text-white font-weight underline" href="{{ route('users.index') }}">Lista de usuarios</a>
                    / Crear usuario
                </span>
            </h2>
        </div>

        <a href="{{ route('users.index') }}">
            <div class="w-auto text-center text-base sm:w-auto items-center justify-center text-blue-900 group-hover:text-blue-500 font-medium leading-none bg-white rounded-lg shadow-sm group-hover:shadow-lg py-3 px-5 border border-transparent transform group-hover:-translate-y-0.5 transition-all duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="inline">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                {{ __('Back') }}
            </div>
        </a>

    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-3 md:gap-4">
            <div class="md:col-span-1">
                <x-jet-section-title>
                    <x-slot name="title">Descripción</x-slot>
                    <x-slot name="description">Crear un usuario</x-slot>
                </x-jet-section-title>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="POST" action="{{ route('users.store') }}">
                    @csrf

                    <div>
                        <x-jet-label class="mb-4" for="nombre" value="Nombre" />
                        <x-jet-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required />
                        <x-jet-input-error for="nombre" class="mt-2" />
                    </div>

                    <div class="mt-1/6">
                        <x-jet-label class="mb-4" for="email" value="Correo electrónico" />
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                        <x-jet-input-error for="email" class="mt-2" />
                    </div>

                    <div class="mt-1/6">
                        <x-jet-label class="mb-4" for="tipo_documento" value="Tipo de documento" />
                        <select id="tipo_documento" class="form-select w-full" name="tipo_documento" required>
                            <option value="">Seleccione un tipo de documento</option>
                            <option value="cc" {{ old('tipo_documento') == 'cc' ? 'selected' : '' }}>Cédula de ciudadanía</option>
                            <option value="ti" {{ old('tipo_documento') == 'ti' ? 'selected' : '' }}>Tarjeta de identidad</option>
                            <option value="ce" {{ old('tipo_documento') == 'ce' ? 'selected' : '' }}>Cédula de extranjería</option>
                        </select>
                        <x-jet-input-error for="tipo_documento" class="mt-2" />
                    </div>

                    <div class="mt-1/6">
                        <x-jet-label class="mb-4" for="numero_documento" value="Número de documento" />
                        <x-jet-input id="numero_documento" class="block mt-1 w-full" type="number" name="numero_documento" :value="old('numero_documento')" required />
                        <x-jet-input-error for="numero_documento" class="mt-2" />
                    </div>

                    <div class="mt-1/6">
                        <x-jet-label class="mb-4" for="numero_celular" value="Número de celular" />
                        <x-jet-input id="numero_celular" class="block mt-1 w-full" type="number" name="numero_celular" :value="old('numero_celular')" required />
                        <x-jet-input-error for="numero_celular" class="mt-2" />
                    </div>

                    <div class="mt-1/6">
                        <x-jet-label class="mb-4" for="intereses" value="Intereses profesionales y formativos" />
                        <small class="inline-block text-gray-500">Separe con comas cada interés</small>
                        <textarea rows="20" id="intereses" name="intereses" class="form-textarea border-0 w-full" value="{{ old('intereses') }}" required>{{ old('intereses') }}</textarea>
                        <x-jet-input-error for="intereses" class="mt-2" />
                    </div>

                    <p class="mt-1/6">¿Está habilitado? </p>
                    <div class="block mt-4">
                        <label for="esta_habilitado_yes" class="flex items-center">
                            <input id="esta_habilitado_yes" value="1" type="radio" class="form-radio" name="esta_habilitado" {{ old('esta_habilitado') == 1 ? 'checked' : '' }}>
                            <span class="ml-2 text-sm text-gray-600">{{ __('Yes') }}</span>
                        </label>
                        <label for="esta_habilitado_no" class="flex items-center">
                            <input id="esta_habilitado_no" value="0" type="radio" class="form-radio" name="esta_habilitado" {{ old('esta_habilitado') != null && old('esta_habilitado') == 0 ? 'checked' : '' }}>
                            <span class="ml-2 text-sm text-gray-600">{{ __('No') }}</span>
                        </label>
                        <x-jet-input-error for="esta_habilitado" class="mt-2" />
                    </div>

                    <p class="mt-1/6">Roles </p>
                    <div class="block mt-4">
                        @forelse ($roles as $role)
                            <label class="flex items-center">
                                <input type="checkbox" class="form-checkbox" name="role_id[]" value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'checked' : '' }}>
                                <span class="ml-2 text-sm text-gray-600">{{ $role->name }}</span>
                            </label>
                        @empty
                            <p class="p-4">{{ __('No data recorded') }}</p>
                        @endforelse
                        <x-jet-input-error for="role_id" class="mt-2" />
                    </div>

                    <x-drop-down-facultades :form="'yes'" />

                    <div class="flex items-center justify-end mt-4">
                        <x-jet-button class="ml-4">
                            {{ __('Create') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Alert component --}}
    @if (session('estado') || (!is_null($errors) && $errors->any() > 0))
        <x-data-alert />
    @endif

</x-app-layout>
