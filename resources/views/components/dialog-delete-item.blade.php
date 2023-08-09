@props(['id' => null, 'code' => null, 'href' => null, 'open' => null])

<div
    class="z-50 modal d-none opacity-0 pointer-eventos-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

        <div
            class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
            <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                viewBox="0 0 18 18">
                <path
                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                </path>
            </svg>
            <span class="text-sm">(Esc)</span>
        </div>

        <!--Body-->
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
                <div
                    class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                    <svg class="h-6 w-6 text-red-600" x-descripcion="Heroicon name: exclamation"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                        </path>
                    </svg>
                </div>
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                        {{ __('Delete element') }}
                    </h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-500">
                            {{ __('Are you sure you want to delete this element? All data will be permanently removed. This action cannot be undone.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!--Footer-->
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <form method="POST" action="" id="form" class="mb-0">
                @csrf()
                @method('DELETE')

                <button type="submit"
                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">{{ __('Delete') }}</button>
            </form>
            <button type="button"
                class="modal-close mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">{{ __('Close') }}</button>
            <input id="code" hidden>
        </div>
    </div>
</div>

@once
    @push('scripts')
        <script>
            // se manda la ruta por un evento onclick se pone id pero es la ruta completa de cada delete
            function modal(id) {
                //se agrega el value que es la ruta y el id que es el dato que se desea borrar
                var input = document.getElementById('code');
                input.setAttribute('value', id);
            }

            document.addEventListener(
                "DOMContentLoaded",
                function() {
                    // toma el valor del boton o enalce con la clase modal open
                    var openmodal = document.getElementsByClassName('modal-open')
                    var id = null;

                    for (var i = 0; i < openmodal.length; i++) {
                        openmodal[i].addEventListener('click', function(event) {
                            event.preventDefault()
                            toggleModal()

                        })
                    }

                    const overlay = document.querySelector('.modal-overlay')
                    overlay.addEventListener('click', toggleModal)

                    var closemodal = document.querySelectorAll('.modal-close')
                    for (var i = 0; i < closemodal.length; i++) {
                        closemodal[i].addEventListener('click', toggleModal)
                    }

                    document.onkeydown = function(evt) {
                        evt = evt || window.event
                        var isEscape = false
                        if ("key" in evt) {
                            isEscape = (evt.key === "Escape" || evt.key === "Esc")
                        } else {
                            isEscape = (evt.keyCode === 27)
                        }
                        if (isEscape && document.body.classList.contains('modal-active')) {
                            toggleModal()
                        }
                    };


                    function toggleModal() {
                        //se dan los estilos al abrir y cerrar para dar efectos de demora y duracion
                        const body = document.querySelector('body')
                        const modal = document.querySelector('.modal')
                        const form = document.querySelector('#form')
                        const input = document.getElementById('code')

                        modal.classList.toggle('opacity-0')
                        modal.classList.toggle('d-none')
                        modal.classList.toggle('pointer-eventos-none')
                        modal.classList.toggle('transition')
                        modal.classList.toggle('delay-400')
                        modal.classList.toggle('duration-500')
                        modal.classList.toggle('ease-in-out')

                        body.classList.toggle('modal-active')

                        //al activarse el toggle modal se setea el action del form y se le agrega la ruta guardada en el input
                        form.setAttribute('action', input.value)
                    }
                }, false
            )
        </script>
    @endpush
@endonce
