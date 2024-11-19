<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"   
    x-cloak
    x-data="{darkMode: localStorage.getItem('dark') === 'true'}"
    x-init="$watch('darkMode', val => localStorage.setItem('dark', val))"
    x-bind:class="{'dark': darkMode}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>UrbanInmo</title>


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body 
class="h-svh overflow-y-hidden"
{{-- class="dark:bg-gray-800  h-screen {{ session('darkMode') ? 'dark' : '' }} " --}}
>
    @livewire("profile")
</body>

</html>
