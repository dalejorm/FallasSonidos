<title>Gestión de Usuarios</title>
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
			border-radius: 0.25rem;
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
			background: #36A9E1 !important;
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
			background: #36A9E1 !important;
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
			background-color: #36A9E1 !important;
			/*bg-indigo-500*/
		}
	</style>
<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2 content-around static p-8 mt-6 lg:mt-0 mx-6 rounded shadow">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios del sistema') }}
        </h2>
        </div>
    </x-slot>    

    <div id='recipients' class="pt-6 max-w-7xl lg:w-11/12 sm:w-full mx-auto p-8 mt-6 rounded shadow bg-white">
        
        <table id="userTable" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
        <thead class="border-b font-medium dark:border-neutral-500">
            <tr>
            <th scope="col" class="px-6 py-4"># Documento</th>
            <th scope="col" class="px-6 py-4">Nombre</th>
            <th scope="col" class="px-6 py-4">Correo</th>
            <th scope="col" class="px-6 py-4">Estado</th>
            <th scope="col" class="px-6 py-4">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
        <tr class="border-b dark:border-neutral-500">
            <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $user->document_number }}</td>
            <td class="whitespace-nowrap px-6 py-4">{{ $user->name}}</td>
            <td class="whitespace-nowrap px-6 py-4">{{ $user->email}}</td>

            <td class="whitespace-nowrap px-6 py-4">
            @if($user->active == 1)
            <div class="flex items-center">
                <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> Activo
            </div>
            @endif
            @if($user->active == 0)
            <div class="flex items-center">
                <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div> Innactivo
            </div>
            @endif  
            </td>
            <td class="whitespace-nowrap px-6 py-4">
                <!-- 
                <div class="flex item-center justify-center">
                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">                
                        <a href="{{ route('gestion-usuarios.show', [$user]) }}" data-te-toggle="tooltip" title="Detallar">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        </a>
                    </div>
                </div> -->
                @if($user->active == 1)
                <div class="flex item-center justify-center">
                    <div class="w-4 mr-2 transform hover:text-[#36A9E1] hover:scale-110" data-te-toggle="tooltip" title="Desactivar">
                    
                    <form action="{{ route('gestion-usuarios.update', [$user]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input hidden id="active" name="active" type="text" value="{{ $user->active }}"/>
                    <input hidden id="accion" name="accion" type="text" value="estado"/>

                        <button type="submit" class="">                       
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                            </svg>  
                        </button>
                    </form>
                    </div>
                </div>
                @endif

                @if($user->active == 0)
                <div class="flex item-center justify-center">
                    <div class="w-4 mr-2 transform hover:text-[#36A9E1] hover:scale-110" data-te-toggle="tooltip" title="Activar">
                    <form action="{{ route('gestion-usuarios.update', [$user]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input hidden id="active" name="active" type="text" value="{{ $user->active }}"/>
                    <input hidden id="accion" name="accion" type="text" value="estado"/>
                        <button type="submit" class="">   
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                            </svg>                                                    
                        </button>
                    </form>
                    </div>
                </div>
                @endif
                <!-- 
                <div class="flex item-center justify-center">
                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                        <a href="{{ route('gestion-usuarios.show', [$user, 'a0']) }}" data-te-toggle="tooltip" title="Eliminar">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>                                                   
                        </a>
                    </div>
                </div> -->
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

        var table = $('#userTable').DataTable({
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
