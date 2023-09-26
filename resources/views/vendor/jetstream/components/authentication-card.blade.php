<div class="mt-0 flex flex-col sm:justify-center items-center pt-6 sm:pt-12 bg-gray-100">
    <!--cut min-h-screen-->
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-0 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg  drop-shadow-xl">
        {{ $slot }}
    </div>
</div>
