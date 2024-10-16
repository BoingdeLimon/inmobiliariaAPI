<x-guest-layout>
    <x-authentication-card>
        <x-label class="flex flex-col space-y-1.5 p-6">
            <div class="w-full flex flex-col gap-y-4 items-center justify-center text-black">
            <h1 class="text-3xl font-semibold">Nos alegra verte de nuevo</h1>
            </div>
        </x-label>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Correo Electronico') }}" />
                <x-input id="email" placeholder="Ingresa tu email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" placeholder="Debe tener al menos 6 caracteres" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="flex flex-row justify-between mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
                @if (Route::has('password.request'))
                <a class="underline text-sm text-blue-600 hover:text-blue-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('¿Olvidaste tu contraseña?') }}
                </a>
            @endif
            </div>

            <div class="flex items-center justify-center mt-4">
               

                <x-button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 text-primary-foreground shadow h-9 px-4 py-2 w-full bg-blue-600 hover:bg-blue-900">
                    {{ __('Iniciar Sesión') }}
                </x-button>
            </div>

        </form>
        <div class="flex items-center p-6 pt-4">
            <a class="inline-flex items-center justify-center whitespace-nowrap transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 text-primary underline-offset-4 hover:underline h-8 rounded-md px-3 text-xs font-normal w-full" href="{{ route('register')}}">
                ¿No tienes cuenta? Registrate aquí.
            </a>
        </div>
    </x-authentication-card>
</x-guest-layout>
