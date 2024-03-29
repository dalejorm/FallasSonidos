<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div>
        <x-jet-application-logo class="block h-12 w-auto" />
    </div>

    <div class="mt-8 text-2xl">
    Bienvenido al Sistema de Gestión de Conocimiento de Fallas y Ruidos Vehículares!
    </div>

    <div class="mt-6 text-gray-500">
    Este es un sistema desarrollado por el Sena, con el fin de caracterizar y 
    sistematizar la información correspondiente con los ruidos y las fallas vehiculares;
    hace parte de un proyecto el cual su finalidad es investigativa y formativa.
    </div>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    <div class="p-6">
        <div class="flex items-center">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{ route('gestion-fallas.index') }}">Gestión de fallas y ruidos</a></div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
            En el modulo de gestión de fallas y ruidos, podrás como usuario registrar en el sistema de conocimiento, las fallas y ruidos que deseas registrar para compartir dicha información con la comunidad.            </div>

            <a href="{{ route('gestion-fallas.index') }}">
                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                        <div>Explore el modulo</div>

                        <div class="ml-1 text-indigo-500">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </div>
                </div>
            </a>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
        <div class="flex items-center">
            <svg class="h-8 w-8 text-gray-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M15 8a5 5 0 0 1 0 8" />  <path d="M17.7 5a9 9 0 0 1 0 14" />  <path d="M6 15 h-2a1 1 0 0 1 -1 -1v-4a1 1 0 0 1 1 -1h2l3.5 -4.5a.8 .8 0 0 1 1.5 .5v14a.8 .8 0 0 1 -1.5 .5l-3.5 -4.5" /></svg>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="#sectionBuscador">Buscador</a></div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
            En el buscador de sistema de gestión de conocimiento, podrás realizar búsquedas filtrando la información de acuerdo a tu interés, allí podrás encontrar los resultados acorde a toda la información que se almacena y se ha registrado por la comunidad.            </div>

            <a href="#sectionBuscador">
                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                        <div>Inicia tu busqueda</div>

                        <div class="ml-1 text-indigo-500">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </div>
                </div>
            </a>
        </div>
    </div>
</div>
