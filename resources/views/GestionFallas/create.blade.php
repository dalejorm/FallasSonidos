<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2 content-around">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear registro de Falla y Ruido') }}
        </h2>        
        </div>
        
    </x-slot>

    <form  action="{{ route('gestion-fallas.store') }}" method="POST" enctype="multipart/form-data">

    <div id='recipients' class="static w-max p-8 mt-6 lg:mt-0 mx-6 rounded shadow bg-white">
        <h2 class="p-2 font-semibold text-xl text-gray-800 leading-tight">Datos del vehículo</h2>
        <div class="rounded-t-lg overflow-hidden border border-l border-r border-gray-400 flex justify-center p-8">
            
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Tipo de auto
                    </label>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                        <option>Vehículo</option>
                        <option>Camioneta</option>
                        </select>                        
                    </div>
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                        Línea
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe">
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Modelo
                    </label>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                        <option>2023</option>
                        <option>2022</option>
                        <option>2021</option>
                        <option>2020</option>
                        </select>                        
                    </div>
                </div>

                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                        Kilometraje
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe">
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Marca
                    </label>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                        <option>Nissan</option>
                        <option>Jeep</option>
                        <option>Suzuky</option>
                        <option>Mazda</option>
                        </select>                        
                    </div>
                </div>

                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                        cilindraje
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe">
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Tipo combustible
                    </label>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                        <option>Gasolina</option>
                        <option>Diesel</option>
                        </select>                        
                    </div>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Transmisión
                    </label>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                        <option>Manual</option>
                        <option>Automatica</option>
                        </select>                        
                    </div>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Tipo de dirección
                    </label>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                        <option>Mecánica</option>
                        <option>Hidráulica</option>
                        <option>Electro asistida</option>
                        </select>                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id='recipients' class="static p-8 mt-6 lg:mt-0 mx-6 rounded shadow bg-white">
        <h2 class="p-2 font-semibold text-xl text-gray-800 leading-tight">Información de la falla</h2>                
        <div class="rounded-t-lg overflow-hidden border border-l border-r border-gray-400 flex justify-center p-8">                            
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                        Nombre de la falla
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe">
                </div>  

                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                        Diagnostico de la falla
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe">
                </div> 

                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                        Elemento que presento la falla
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe">
                </div>              

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Sistema de falla
                    </label>
                    <div class="relative">
                        <select id="SistemaFalla" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                        <option value="FR">Frenos</option>
                        <option value="SU">Suspensión</option>
                        <option value="CR">Carrocería</option>
                        </select>                        
                    </div>
                </div>

                <div class="hidden" id="tab-frenos">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            Sistema de frenos
                        </label>
                        <div class="relative">
                            <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                            <option>Tambor</option>
                            <option>Disco</option>
                            </select>                        
                        </div>
                    </div>
                </div>

                <div class="hidden" id="tab-suspension">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            Sistema de suspensión
                        </label>
                        <div class="relative">
                            <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                            <option>Independiente</option>
                            <option>Semi Independiente</option>
                            <option>Rígido</option>
                            </select>                        
                        </div>
                    </div>
                </div>

                <div class="hidden" id="tab-carroceria">
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                            Elemento que presento la falla
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe">
                    </div>
                </div>

                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                        Descripción de la reparación
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe">
                </div>
                
                <div class="w-full md:w-1/2 px-3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Cargar grabación principal</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">MP3 (MAX. 10MB).</p>
            
                </div>

                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                        Lugar de grabación en el vehiculo
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe">
                </div>
            </div>                          
        </div>
    </div>

    <div id='recipients' class="static p-8 mt-6 lg:mt-0 mx-6 rounded shadow bg-white">
        <h2 class="p-2 font-semibold text-xl text-gray-800 leading-tight">Grabaciones extras</h2>   
        <div class="rounded-t-lg overflow-hidden border border-l border-r border-gray-400 flex justify-center p-8"> 
                         
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Cargar grabación #2</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">MP3 (MAX. 10MB).</p>
            
                </div>

                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                        Lugar de grabación #2 en el vehiculo
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe">
                </div>

                <div class="w-full md:w-1/2 px-3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Cargar grabación #3</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">MP3 (MAX. 10MB).</p>
            
                </div>

                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                        Lugar de grabación #3 en el vehiculo
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe">
                </div>

                <div class="w-full md:w-1/2 px-3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Cargar grabación #4</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">MP3 (MAX. 10MB).</p>
            
                </div>

                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                        Lugar de grabación #4 en el vehiculo
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe">
                </div>
                <div class="grid grid-cols-3 w-full md:w-1/2 px-3">
                    <div></div>
                    <a href="{{ route('gestion-fallas.store') }}" class="mx-6 mt-6 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded text-center">
                        Crear nuevo registro de falla y ruido
                    </a>
                    <div></div>
                </div>
            </div>
        </div>
    </div>
        
    
</form>
</x-app-layout>
<script> 
    var selector  = document.getElementById("SistemaFalla");            
    selector.addEventListener( 'change', () => {            
        var valueSelector = selector.value; 
        console.log("Ingreso al evento " + valueSelector );
        console.log(valueSelector);
        if(valueSelector == "FR") {
            console.log("Ingreso a frenos");
            document.getElementById("tab-frenos").classList.remove("hidden"); 
            document.getElementById("tab-suspension").classList.add("hidden");
            document.getElementById("tab-carroceria").classList.add("hidden");               
        }
        
        if(valueSelector == "SU"){
            console.log("Ingreso a suspension ");
            document.getElementById("tab-suspension").classList.remove("hidden"); 
            document.getElementById("tab-frenos").classList.add("hidden");
            document.getElementById("tab-carroceria").classList.add("hidden");
        }

        if(valueSelector == "CR"){
            console.log("Ingreso a carroceria ");
            document.getElementById("tab-carroceria").classList.remove("hidden"); 
            document.getElementById("tab-frenos").classList.add("hidden");
            document.getElementById("tab-suspension").classList.add("hidden");
        }
    });            
</script>


