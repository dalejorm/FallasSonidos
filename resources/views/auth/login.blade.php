<x-guest-layout>
    <x-backgroundSup />
    <x-jet-authentication-card>
        
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Correo electrónico') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Recuerdame') }}</span>
                </label>
                
            </div>

            <div class="flex items-center justify-center mt-4">
                <a class="no-underline text-base text-[#36A9E1] hover:text-[#2F80ED]  mt-5" href="{{ route('register') }}">
                        {{ __('¿No estas registrado?') }}
                </a>
            </div>


            <div class="flex items-center flex-col justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="no-underline text-base text-[#36A9E1] hover:text-[#2F80ED] mb-2 pb-2" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                @endif

                <x-jet-button class="ml-5 ">
                    {{ __('Ingresar') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
    <x-backgroundInf />
    <x-footer />
</x-guest-layout>
