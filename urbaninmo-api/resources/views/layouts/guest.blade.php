<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    x-cloak
    x-data="{darkMode: localStorage.getItem('dark') === 'true'}"
    x-init="$watch('darkMode', val => localStorage.setItem('dark', val))"
    x-bind:class="{'dark': darkMode}"
    >
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
    <body  class="{{ session('darkMode') ? 'dark' : '' }}" class="dark:bg-slate-800"> 
        <section class='w-full lg:grid  lg:grid-cols-5 dark:bg-gray-800'>
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
                 class='h-screen w-full object-cover '/>
            </div>
              <div class='h-screen w-3/4 ml-[10%] flex items-center justify-center col-span-2 grow px-3 font-sans antialiased dark:bg-gray-800'>
                
                {{ $slot }}
              </div>
          </section>
        

        @livewireScripts
    </body>
</html>
