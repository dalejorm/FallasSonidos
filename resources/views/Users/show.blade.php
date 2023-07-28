<title>Detalles del usuario {{ $user->name }}</title>
<x-app-layout>
    <x-slot name="header">
        <div class="col-start-2 col-span-4 md:col-start-1 md:col-span-3 xl:col-start-1 xl:col-span-3">
            <h2 class="font-display text-white text-center md:text-left text-2xl leading-9 font-semibold sm:text-3xl sm:leading-9">
                Usuarios
                <span class="text-base sm:text-2xl block text-purple-300">
                    <a class="text-white font-weight underline" href="{{ route('users.index') }}">Lista de usuarios</a>
                    / Detalles del usuario
                </span>
            </h2>
        </div>

        <a href="{{ route('users.edit', [$user]) }}">
            <div class="w-auto text-center text-base sm:w-auto items-center justify-center text-blue-900 group-hover:text-blue-500 font-medium leading-none bg-white rounded-lg shadow-sm group-hover:shadow-lg py-3 px-3 md:px-5 border border-transparent transform group-hover:-translate-y-0.5 transition-all duration-150">
                Editar usuario
            </div>
        </a>

    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-2 md:gap-4">
            <div>
                <h3 class="text-lg font-medium text-gray-900">Información del usuario <span class="text-capitalize">{{ $user->name }}</span></h3>
            </div>
            <div>
                <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg">
                    <h3 class="text-lg font-medium text-gray-900">Nombre</h3>
                    <div class="mt-3 max-w-xl text-sm text-gray-600">
                        <p>
                            {{ $user->name }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="hidden sm:block">
            <div class="py-8">
                <div class="border-t border-gray-200"></div>
            </div>
        </div>

        <div class="md:grid md:grid-cols-2 md:gap-4">
            <div>

            </div>
            <div>
                <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg">
                    <h3 class="text-lg font-medium text-gray-900">Correo electrónico</h3>
                    <div class="mt-3 max-w-xl text-sm text-gray-600">
                        <p>
                            {{ $user->email }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="hidden sm:block">
            <div class="py-8">
                <div class="border-t border-gray-200"></div>
            </div>
        </div>

        <div class="md:grid md:grid-cols-2 md:gap-4">
            <div>

            </div>
            <div>
                <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg">
                    <h3 class="text-lg font-medium text-gray-900">¿Está habilitado?</h3>
                    <div class="mt-3 max-w-xl text-sm text-gray-600">
                        <p>
                            @if ($user->esta_habilitado == 1)
                                {{ 'Si' }}
                            @else
                                {{ 'No' }}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="hidden sm:block">
            <div class="py-8">
                <div class="border-t border-gray-200"></div>
            </div>
        </div>

        <div class="md:grid md:grid-cols-2 md:gap-4">
            <div>

            </div>
            <div>
                <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg">
                    <h3 class="text-lg font-medium text-gray-900">Intereses profesionales y formativos</h3>
                    <div class="mt-3 max-w-xl text-sm text-gray-600">
                        <ul>
                            @foreach (explode(',', implode(json_decode($user->intereses))) as $interest)
                            <li>{{ $interest }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="hidden sm:block">
            <div class="py-8">
                <div class="border-t border-gray-200"></div>
            </div>
        </div>

        <div class="md:grid md:grid-cols-2 md:gap-4">
            <div>

            </div>
            <div>
                <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg">
                    <h3 class="text-lg font-medium text-gray-900">Número de documento</h3>
                    <div class="mt-3 max-w-xl text-sm text-gray-600">
                        <p class="uppercase ">
                            {{ $user->tipo_documento }} {{ $user->numero_documento }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="hidden sm:block">
            <div class="py-8">
                <div class="border-t border-gray-200"></div>
            </div>
        </div>

        <div class="md:grid md:grid-cols-2 md:gap-4">
            <div>

            </div>
            <div>
                <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg">
                    <h3 class="text-lg font-medium text-gray-900">Número de celular</h3>
                    <div class="mt-3 max-w-xl text-sm text-gray-600">
                        <p>
                            {{ $user->numero_celular }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
