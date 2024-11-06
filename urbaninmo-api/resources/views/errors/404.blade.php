<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page not found</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>
    <script>
        const isDarkMode =
            localStorage.getItem('color-theme') === 'dark' ||
            (!('color-theme' in localStorage) &&
                window.matchMedia('(prefers-color-scheme: dark)').matches);

        if (isDarkMode) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    <div class='h-screen w-full '>
        <section class="flex  items-center h-full p-16 dark:bg-gray-900 dark:text-gray-100">
            <div class="container flex flex-col items-center justify-center px-5 mx-auto my-8">
                <div class="max-w-md text-center">
                    <h2 class="mb-8 font-extrabold text-9xl dark:text-gray-500">
                        <span class="sr-only">Error</span>404
                    </h2>
                    <p class="text-2xl font-semibold md:text-3xl">Lo sentimos, no pudimos encontrar esta página.</p>
                    <p class="mt-4 mb-8 dark:text-gray-400">
                        Pero no te preocupes, puedes encontrar muchas otras cosas en nuestra página principal.
                    </p>
                    <a href="/" class="px-8 py-3 font-semibold rounded dark:bg-cyan-600 dark:text-gray-100">
                        Volver a la página principal
                    </a>
                </div>
            </div>
        </section>
    </div>
</body>

</html>
