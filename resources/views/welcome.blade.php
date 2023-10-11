<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SGCFR</title>
    <!-- Icon -->
    <link rel="icon" href="{{ asset('img/brand/favicon.png') }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Scripts -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="antialiased bg-[#F3F4F6]">
    <div class="flex justify-between bg-white">
        <!-- Logo -->
        <div class="flex px-4 sm:px-6 lg:px-8">
            <a href="{{ route('dashboard') }}">
                <x-dashboardLogo class="block w-auto" />
            </a>
        </div>
        @if (Route::has('login'))
            <div class="hidden top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="drop-shadow-xl inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-sky-400 hover:bg-sky-600 focus:outline-none focus:ring focus:ring-sky-300 focus:ring-opacity-50 border-b-4 border-sky-700 hover:border-sky-500 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                        </svg>

                        Panel de usuario
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="drop-shadow-xl inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-400 hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                        </svg>

                        Ingreso
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="drop-shadow-xl ml-4 inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-500 bg-gray-300 hover:bg-gray-400 focus:outline-none focus:ring focus:ring-gray-400 focus:ring-opacity-50 border-b-4 border-gray-700 hover:border-gray-500 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                            </svg>

                            Registro
                        </a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
    <x-backgroundSup />
    <main class="max-h-fit flex flex-col sm:justify-center items-center pt-4 sm:pt-10">
        <x-iconGear />
        <div id="welcomeT" class="absolute top-30 z-30 overflow-hidden shadow sm:rounded-lg max-w-5xl m-6 bg-white">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="p-6">
                    <div class="flex items-center">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                            <path
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                        <div class="ml-4 text-lg leading-7 font-semibold"><span
                                class="underline text-gray-700 dark:text-white">Gestión de fallas y ruidos</span></div>
                    </div>

                    <div class="ml-12">
                        <div class="mt-2 text-gray-700 text-sm">
                            En el modulo de gestión de fallas y ruidos, podrás como usuario registrar en el sistema de
                            conocimiento, las fallas y ruidos que deseas registrar para compartir dicha información con
                            la comunidad.
                        </div>
                    </div>
                </div>

                <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8  text-gray-600">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 15.75l-2.489-2.489m0 0a3.375 3.375 0 10-4.773-4.773 3.375 3.375 0 004.774 4.774zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>

                        <div class="ml-4 text-lg leading-7 font-semibold"><span
                                class="underline text-gray-700 ">Buscador</span></div>
                    </div>

                    <div class="ml-12">
                        <div class="mt-2 text-gray-700 text-sm">
                            En el buscador de sistema de gestión de conocimiento, podrás realizar búsquedas filtrando la
                            información de acuerdo a tu interés, allí podrás encontrar los resultados acorde a toda la
                            información que se almacena y se ha registrado por la comunidad.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-bgWavy />

    </main>
    <x-backgroundInf />
    <x-footer />
</body>
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>

</html>
