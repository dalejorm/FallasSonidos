<div class="alert-toast right-0 m-8 border-0 rounded mb-4 w-500 fixed bottom-0 bg-blue-100 border-t-4 border-blue-500 rounded-b text-blue-900 shadow-md" x-data="{ showAlert: true }" x-show="showAlert" class="transition ease-in-out duration-1000" x-init="setTimeout(() => showAlert = false, 5000)">
    <input type="checkbox" class="hidden" id="footeralert">

    <div class="flex items-center justify-between w-full p-2 px-6 py-4 shadow text-black">
        <span class="inline-block align-middle mr-8">
            {{-- imprimimos el mensaje que llega del controlador --}}
            @if (session('estado'))
                <p> {{ __(session('estado')) }}</p>
            @else
                <p>Tiene errores en algunos campos. Por favor revise nuevamente el formulario.</p>
            @endif

        </span>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener(
            "DOMContentLoaded",
            function() {
                // el evento se repite indefinidamente para verificar en todo momento si existe una session estado que mostrar
                /* ! se demora unos segundos y lo cierra automaticamento este evento solo se muestra una vez al validar el evento
                 */
                var cont = 0;
                var input = document.getElementById('footeralert');

                var id = setInterval(function() {
                    cont++;
                    if (cont == 10) {
                        input.setAttribute('checked', 'checked');
                        clearInterval(id);
                    }
                }, 1000);

                function closeAlert(event) {
                    let element = event.target;

                }
            }, false
        )
    </script>
@endpush