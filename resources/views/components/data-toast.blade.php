 <!-- Aquí mostraremos el mensaje de alerta -->
 <div
 class="pointer-events-auto fixed bottom-0 left-0 mb-12 ml-5 mx-auto w-96 max-w-full rounded-lg bg-warning-100 bg-clip-padding text-sm text-warning-700 shadow-lg shadow-black/5 data-[te-toast-show]:block data-[te-toast-hide]:hidden"
 role="alert"
 aria-live="assertive"
 aria-atomic="true"
 data-te-autohide="false"
 data-te-toast-init
 data-te-toast-show style="z-index: 99999;">
 
 <div
     class="flex items-center justify-between rounded-t-lg border-b-2 border-warning-200 bg-warning-100 bg-clip-padding px-4 pb-2 pt-2.5 text-warning-700">
     <p class="flex items-center font-bold text-warning-700">
         <svg
             aria-hidden="true"
             focusable="false"
             data-prefix="fas"
             data-icon="exclamation-triangle"
             class="mr-2 h-4 w-4 fill-current"
             role="img"
             xmlns="http://www.w3.org/2000/svg"
             viewBox="0 0 576 512">
             <path
                 fill="currentColor"
                 d="M569.517 440.013C587.975 472.007 564.806 512 527.94 512H48.054c-36.937 0-59.999-40.055-41.577-71.987L246.423 23.985c18.467-32.009 64.72-31.951 83.154 0l239.94 416.028zM288 354c-25.405 0-46 20.595-46 46s20.595 46 46 46 46-20.595 46-46-20.595-46-46-46zm-43.673-165.346l7.418 136c.347 6.364 5.609 11.346 11.982 11.346h48.546c6.373 0 11.635-4.982 11.982-11.346l7.418-136c.375-6.874-5.098-12.654-11.982-12.654h-63.383c-6.884 0-12.356 5.78-11.981 12.654z"></path>
         </svg>
         Tienes errores en algunos campos
     </p>
     <div class="flex items-center">
         <button
             type="button"
             class="ml-2 box-content rounded-none border-none opacity-80 hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
             data-te-toast-dismiss
             aria-label="Close">
             <span
                 class="w-[1em] focus:opacity-100 disabled:pointer-events-none disabled:select-none disabled:opacity-25 [&.disabled]:pointer-events-none [&.disabled]:select-none [&.disabled]:opacity-25">
                 <svg
                     xmlns="http://www.w3.org/2000/svg"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke-width="1.5"
                     stroke="currentColor"
                     class="h-6 w-6">
                     <path
                         stroke-linecap="round"
                         stroke-linejoin="round"
                         d="M6 18L18 6M6 6l12 12" />
                 </svg>
             </span>
         </button>
     </div>
 </div>
 <div
     class="break-words rounded-b-lg bg-warning-100 px-4 py-4 text-warning-700">
     <!-- Aquí puedes agregar el contenido de tu mensaje de alerta -->
     Por favor revise nuevamente el formulario
 </div>
</div>