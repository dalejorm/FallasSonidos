 <!-- Aquí mostraremos el mensaje de alerta -->
 <div class="pointer-events-auto fixed bottom-0 left-0 mb-12 ml-5 mx-auto w-96 max-w-full rounded-lg bg-danger-100 bg-clip-padding text-sm text-danger-700 shadow-lg shadow-black/5 data-[te-toast-show]:block data-[te-toast-hide]:hidden"
     role="alert" aria-live="assertive" aria-atomic="true" data-te-autohide="false" data-te-toast-init data-te-toast-show
     style="z-index: 99999;">

     <div
         class="flex items-center justify-between rounded-t-lg border-b-2 border-danger-200 bg-danger-100 bg-clip-padding px-4 pb-2 pt-2.5 text-danger-700">
         <p class="flex items-center font-bold text-danger-700">
             <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle"
                 class="mr-2 h-4 w-4 fill-current" role="img" xmlns="http://www.w3.org/2000/svg"
                 viewBox="0 0 512 512">
                 <path fill="currentColor"
                     d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z">
                 </path>
             </svg>
             Tienes errores en algunos campos
         </p>
         <div class="flex items-center">
             <button type="button"
                 class="ml-2 box-content rounded-none border-none opacity-80 hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                 data-te-toast-dismiss aria-label="Close">
                 <span
                     class="w-[1em] focus:opacity-100 disabled:pointer-events-none disabled:select-none disabled:opacity-25 [&.disabled]:pointer-events-none [&.disabled]:select-none [&.disabled]:opacity-25">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="h-6 w-6">
                         <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                     </svg>
                 </span>
             </button>
         </div>
     </div>
     <div class="break-words rounded-b-lg bg-danger-100 px-4 py-4 text-danger-700">
         <!-- Aquí puedes agregar el contenido de tu mensaje de alerta -->
         Por favor revise nuevamente el formulario
     </div>
 </div>
