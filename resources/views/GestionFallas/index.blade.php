<title>Gestión de Fallas y Ruidos</title>
<link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet">
	<!--Replace with your tailwind.css once created-->


	<!--Regular Datatables CSS-->
	<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	<!--Responsive Extension Datatables CSS-->
	<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

	<style>
		/*Overrides for Tailwind CSS */

		/*Form fields*/
		.dataTables_wrapper select,
		.dataTables_wrapper .dataTables_filter input {
			color: #4a5568;
			/*text-gray-700*/
			padding-left: 1rem;
			/*pl-4*/
			padding-right: 1rem;
			/*pl-4*/
			padding-top: .5rem;
			/*pl-2*/
			padding-bottom: .5rem;
			/*pl-2*/
			line-height: 1.25;
			/*leading-tight*/
			border-width: 2px;
			/*border-2*/
			border-radius: .25rem;
			border-color: #edf2f7;
			/*border-gray-200*/
			background-color: #edf2f7;
			/*bg-gray-200*/
		}

		/*Row Hover*/
		table.dataTable.hover tbody tr:hover,
		table.dataTable.display tbody tr:hover {
			background-color: #ebf4ff;
			/*bg-indigo-100*/
		}

		/*Pagination Buttons*/
		.dataTables_wrapper .dataTables_paginate .paginate_button {
			font-weight: 700;
			/*font-bold*/
			border-radius: .25rem;
			/*rounded*/
			border: 1px solid transparent;
			/*border border-transparent*/
		}

		/*Pagination Buttons - Current selected */
		.dataTables_wrapper .dataTables_paginate .paginate_button.current {
			color: #fff !important;
			/*text-white*/
			box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
			/*shadow*/
			font-weight: 700;
			/*font-bold*/
			border-radius: .25rem;
			/*rounded*/
			background: #667eea !important;
			/*bg-indigo-500*/
			border: 1px solid transparent;
			/*border border-transparent*/
		}

		/*Pagination Buttons - Hover */
		.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
			color: #fff !important;
			/*text-white*/
			box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
			/*shadow*/
			font-weight: 700;
			/*font-bold*/
			border-radius: .25rem;
			/*rounded*/
			background: #667eea !important;
			/*bg-indigo-500*/
			border: 1px solid transparent;
			/*border border-transparent*/
		}

		/*Add padding to bottom border */
		table.dataTable.no-footer {
			border-bottom: 1px solid #e2e8f0;
			/*border-b-1 border-gray-300*/
			margin-top: 0.75em;
			margin-bottom: 0.75em;
		}

		/*Change colour of responsive icon*/
		table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
		table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
			background-color: #667eea !important;
			/*bg-indigo-500*/
		}
	</style>
<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2 content-around">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fallas y Ruidos registrados') }}
        </h2>
        <a href="{{ route('gestion-fallas.create') }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded text-center">
        Crear nuevo registro de falla y ruido
        </a>
        </div>
        
    </x-slot>    

    <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
        
        <table id="fallasTable" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
        <thead class="border-b font-medium dark:border-neutral-500">
            <tr>
            <th scope="col" class="px-6 py-4">Nombre Falla</th>
            <th scope="col" class="px-6 py-4">Descripción</th>
            <th scope="col" class="px-6 py-4">Grabación principal falla</th>
            <th scope="col" class="px-6 py-4">Estado</th>
            <th scope="col" class="px-6 py-4">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($fallas as $falla)               
                <tr class="border-b dark:border-neutral-500">
                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $falla->nombre_falla}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{ $falla->diagnostico_falla}}</td>
                    <td class="whitespace-nowrap px-6 py-4">
                        <audio controls>
                           <source src="{{asset('storage') . '/' .  $falla->gragacion_principal}}" type="audio/ogg">
                        </audio>
                    </td>
                    <td class="whitespace-nowrap px-6 py-4">
                    @if($falla->estado == "Aprobado")
                    <div class="flex items-center">
                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> {{ $falla->estado}}
                    </div>
                    @endif
                    @if($falla->estado == "Pendiente aprobacion")
                    <div class="flex items-center">
                        <div class="h-2.5 w-2.5 rounded-full bg-gray-500 mr-2"></div> {{ $falla->estado}}
                    </div>
                    @endif
                    @if($falla->estado == "Pendiente eliminar")
                    <div class="flex items-center">
                        <div class="h-2.5 w-2.5 rounded-full bg-yellow-500 mr-2"></div> {{ $falla->estado}}
                    </div>
                    @endif
                    @if($falla->estado == "Rechazado")
                    <div class="flex items-center">
                        <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div> {{ $falla->estado}}
                    </div>
                    @endif   
                    </td>
                    <td class="whitespace-nowrap px-6 py-4">
                         
                        <div class="flex item-center justify-center">
                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">                
                                <a href="{{ route('gestion-fallas.show', [$falla]) }}" data-te-toggle="tooltip" title="Detallar">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                </a>
                            </div>
                        </div>
                        @if ($user->role == 1)
                            @if($user->id == $falla->id_user)
                                <div class="flex item-center justify-center">
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">                
                                        <a href="{{ route('gestion-fallas.edit', [$falla]) }}" data-te-toggle="tooltip" title="Editar">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                        </svg>
                                        </a>
                                    </div>
                                </div>
                            @endif
                            @if($falla->estado == "Pendiente aprobacion")
                                <div class="flex item-center justify-center">
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110" data-te-toggle="tooltip" title="Aprobar">
                                    
                                    <form action="{{ route('aprobacion-fallas.update', [$falla]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input hidden id="active" name="estado" type="text" value="Aprobar"/>

                                        <button type="submit" class="">                       
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                                        </svg>  
                                        </button>
                                    </form>
                                    </div>
                                </div>

                                <div class="flex item-center justify-center">
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110" data-te-toggle="tooltip" title="Rechazar">
                                    
                                    <form action="{{ route('aprobacion-fallas.update', [$falla]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input hidden id="active" name="estado" type="text" value="Rechazar"/>

                                        <button type="submit" class="">                       
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
    
                                        </button>
                                    </form>
                                    </div>
                                </div>
                            @endif
                            @if($falla->estado == "Pendiente eliminar")                            
                                <form method="POST" action="{{ route('aprobacion-fallas.update', [$falla]) }}" id="form" class="mb-0">
                                    @csrf()
                                    @method('PUT')
                                    <input hidden id="active" name="estado" type="text" value="Autoasignar"/>                            
                                    <div class="flex item-center justify-center">
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <button type="submit" class="" data-te-toggle="tooltip" title="Autoasignar">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                            </svg>                                                   
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                <form method="POST" action="{{ route('aprobacion-fallas.update', [$falla]) }}" id="form" class="mb-0">
                                @csrf()
                                @method('PUT')
                                <input hidden id="active" name="estado" type="text" value="Eliminar"/>                            
                                <div class="flex item-center justify-center">
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <button type="submit" class="" data-te-toggle="tooltip" title="Eliminar">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>                                                   
                                        </button>
                                    </div>
                                </div>
                                </form>
                            @endif                            
                        @endif

                        @if ($user->role != 1)
                            <div class="flex item-center justify-center">
                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">            
                                    <a href="{{ route('gestion-fallas.edit', [$falla]) }}" data-te-toggle="tooltip" title="Editar">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                    </svg>
                                    </a>
                                </div>
                            </div>
                            @if($falla->estado != "Pendiente eliminar")
                            <form method="POST" action="{{ route('gestion-fallas.destroy', [$falla]) }}" id="form" class="mb-0">
                            @csrf()
                            @method('DELETE')                            
                            <div class="flex item-center justify-center">
                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                    <button type="submit" class="" data-te-toggle="tooltip" title="Eliminar">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>                                                   
                                    </button>
                                </div>
                            </div>
                            </form>
                            @endif 
                        @endif    
                    </td>
                </tr> 
        @endforeach
        </tbody>
        </table>
    </div>

<!-- jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<!--Datatables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>
    $(document).ready(function() {

        var table = $('#fallasTable').DataTable({
                responsive: true
            })
            .columns.adjust()
            .responsive.recalc();
    });
</script>

{{-- #Component modal --}}

    {{-- Alert component --}}
    @if (session('estado'))
    <x-data-alert />
    @endif
</x-app-layout>
