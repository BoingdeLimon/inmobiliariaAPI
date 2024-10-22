<x-guest-layout>
    <x-authentication-card>
        <x-label class="flex flex-col space-y-1.5 p-6">
            <div class="w-full flex flex-col gap-y-4 items-center justify-center text-black dark:text-white">
            <h1 class="text-3xl font-semibold">Registra tus datos</h1>
            </div>
        </x-label>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" class="dark:text-gray-200">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Nombre') }}" class="dark:text-gray-200"/>
                <x-input id="name" placeholder="Nombre y apellido" class="block mt-3 w-full dark:bg-gray-800 dark:text-white dark:placeholder-gray-400" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Correo Electronico') }}" class="dark:text-gray-200"/>
                <x-input id="email" placeholder="Ingresa tu correo" class="block mt-3 w-full dark:bg-gray-800 dark:text-white dark:placeholder-gray-400" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Contraseña') }}" class="dark:text-gray-200"/>
                <x-input id="password" placeholder="Debe tener al menos 6 caracteres" class="block mt-3 w-full dark:bg-gray-800 dark:text-white dark:placeholder-gray-400" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirmar contraseña') }}" class="dark:text-gray-200"/>
                <x-input id="password_confirmation" placeholder="Confirmar contraseña" class="block mt-3 w-full dark:bg-gray-800 dark:text-white dark:placeholder-gray-400" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                

                <x-button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 text-primary-foreground shadow h-9 px-4 py-2 w-full bg-blue-600 hover:bg-blue-900">
                    {{ __('Registrarse') }}
                </x-button>
            </div>
        </form>
        <div class="flex items-center p-6 pt-4">
            <a class="inline-flex items-center justify-center whitespace-nowrap transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 text-primary underline-offset-4 hover:underline h-8 rounded-md px-3 text-xs font-normal w-full dark:text-white" href="{{ route('login')}}">
                {{ __('¿Ya tienes una cuenta? Inicia sesión') }}
            </a>
            
        </div>
    </x-authentication-card>
</x-guest-layout>
