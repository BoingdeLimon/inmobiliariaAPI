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
    <title>UrbanInmo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />  --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}">  --}}

</head>
<body
  {{-- class="{{ session('darkMode') ? 'dark' : '' }} " --}}
>
    <x-header /> 
    <main>
        @yield('content') 
    </main>
    <x-footer /> 

</body>
</html>
