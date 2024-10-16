<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body>
        <section class='w-full lg:grid lg:min-h-[600px] lg:grid-cols-5 xl:min-h-[800px]'>
            <div class="hidden bg-muted lg:block col-span-3">
                @php
                // Determine which image to show based on the route
                $imagePath = request()->routeIs('login') 
                    ? '/img/login.jpg' 
                    : (request()->routeIs('register') 
                        ? '/img/register.jpg' 
                        : '/img/login2.jpg'); // Optional fallback image
            @endphp

            <img src="{{ asset($imagePath) }}" 
                 alt="Page Image" 
                 class='h-full w-full object-cover dark:brightness-[0.2] dark:grayscale'/>
            </div>
              <div class='h-screen  flex items-center justify-center col-span-2 grow px-3 font-sans text-gray-900 antialiased'>
                {{ $slot }}
              </div>
          </section>
        

        @livewireScripts
    </body>
</html>
