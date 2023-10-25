@php
$authUser = Auth::user();
error_log($authUser); 
@endphp
<!-- Footer container -->
<footer
  class="bg-white mt-0 text-center text-gray-700 dark:bg-neutral-600 dark:text-neutral-400 lg:text-left" style="display: block;">
  <div class="flex items-center justify-center border-b-2 border-neutral-200 p-6 dark:border-neutral-500 lg:justify-between">
  </div>

  <!-- Main container div: holds the entire content of the footer, including four sections (Tailwind Elements, Products, Useful links, and Contact), with responsive styling and appropriate padding/margins. -->
  <div class="mx-6 py-10  text-left sm:text-left md:justify-start md:text-left lg:text-left xl:text-left 2xl:text-left">
    <div class="grid-1 grid gap-8 md:grid-cols-1 lg:grid-cols-3">
      <!-- Tailwind Elements section -->
      <div class="">
        <h6
          class="mb-4 flex items-center justify-center font-semibold uppercase md:justify-start text-gray-900 ">          
          Sistema de Gestión de Conocimiento de Fallas y Ruidos Vehiculares (SGCFRV)
        </h6>
        <p class="text-gray-700 md:justify-start">
          Este es un sistema desarrollado por el Sena, con el fin de caracterizar y 
          sistematizar la información correspondiente con los ruidos y las fallas vehiculares;
           hace parte de un proyecto el cual su finalidad es investigativa y formativa.
        </p>
      </div>
     
      <!-- Useful links section -->
      <div class="ml-0 lg:ml-20 xl:ml-20 2xl:ml-20 text-left sm:text-left justify-start md:text-left ">
        <h6
          class="mb-4 flex font-semibold uppercase md:justify-start text-gray-900">
          Mapa de sitio
        </h6>
        <p class="mb-4">
          <a href="{{ url('terms') }}" class="text-gray-700 dark:text-neutral-200"
            >Politica de uso y
            tratamiento de datos</a>
        </p>
        @auth
        
        @else
        <p class="mb-4">
          <a href="{{ route('register') }}" class="text-gray-700  dark:text-neutral-200"
            >Registro de usuarios</a>
        </p>
        <p class="mb-4">
          <a href="{{ url('forgot-password') }}"  class="text-gray-700  dark:text-neutral-200"
            >Recuperacion de Contraseña</a>
        </p>
        @endauth        
      </div>
      <!-- Contact section -->
      <div class="text-left sm:text-left md:text-left lg:text-left xl:text-left 2xl:text-left lg:items-center xl:items-center 2xl:items-center">
        <h6
          class="mb-4 flex font-semibold uppercase md:justify-start text-gray-900">
          Contacto
        </h6>
        <p class="mb-4  text-gray-700 flex md:justify-start text-left sm:text-left md:text-left lg:text-center xl:text-center 2xl:text-center lg:items-center xl:items-center 2xl:items-center">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="currentColor"
            class="mr-3 h-5 w-5">
            <path
              d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" fill="#2F80ED"/>
            <path
              d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" fill="#2F80ED"/>
          </svg>
          Manizales, Km 10 Vía al Magdalena, CO
        </p>
        <p class="mb-4 flex md:justify-start text-left sm:text-left md:text-left lg:text-center xl:text-center 2xl:text-center lg:items-center xl:items-center 2xl:items-center">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="currentColor"
            class="mr-3 h-5 w-5">
            <path
              d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z" fill="#2F80ED" />
            <path
              d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z" fill="#2F80ED" />
          </svg>
          https://grindda.com
        </p>        
      </div>
    </div>
  </div>

  <!--Copyright section-->
  <div class="bg-[#2F80ED] p-6 text-center text-white">
    <span>© 2023 Copyright:</span>
    <a
      class="font-semibold text-white"
      href="https://grindda.com"
      >SENNOVALAB - GRINDDA</a>
  </div>
</footer>