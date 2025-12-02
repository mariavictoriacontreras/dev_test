<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" />
            
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                        <div class="flex lg:justify-start lg:col-start-1">
                            {{-- Aquí puedes dejar o quitar tu logo SVG --}}
                            <svg class="h-12 w-auto text-white lg:h-16 lg:text-[#FF2D20]" viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg">...</svg>
                        </div>
                        
                        @if (Route::has('login'))
                            {{-- Usamos la Livewire Navigation para la cabecera (muestra Login/Register o Dashboard/Profile) --}}
                            <div class="flex justify-end lg:col-start-3">
                                <livewire:welcome.navigation />
                            </div>
                        @endif
                    </header>

                    <main class="mt-20 flex flex-col items-center justify-center h-48">
                        @auth
                            <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white">Welcome!</h1>
                            <p class="mt-4 text-lg text-gray-600 dark:text-gray-400"><a href="{{ url('/dashboard') }}" class="underline text-[#FF2D20] hover:text-[#e0261a]">Dashboard</a>.</p>
                        @else
                            <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white">Tickets</h1>
                            <p class="mt-4 text-lg text-gray-600 dark:text-gray-400"></p>
                        @endauth
                    </main>
                    
                    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>