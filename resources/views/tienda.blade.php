<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

       
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-100 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Citas</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                    
                    <a href="{{ url('/tienda') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Tienda</a>

                    @auth
                    <a href="{{ url('/tienda/verCarro') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
                        <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="mt-2 w-5 h-5 text-gray-400">
                            <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </a>
                    @endauth
                </div>
            @endif

            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="py-12 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:text-center">
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">TIENDA CitasFisio</p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">Compra nuestro productos última generación.</p>
                </div>

                <div class="mt-10">
                <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                   
                @foreach($productos as $producto)
                    <div class="relative">
                    <dt>
                        <div class="flex items-center ml-5 h-52 w-52 rounded-md  text-blue-500">
                        <!-- Heroicon name: outline/globe-alt -->
                        <img src='{{ $producto->imagen }}'>
                        <span class='ml-5'>{{ $producto->precio }}€</span>
                        @auth
                            <x-boton-tienda :href="$producto->id">
                                Comprar
                            </x-boton-tienda>
                        @endauth
                        </div>
                        <p class="text-lg leading-6 font-medium text-gray-900">{{ $producto->nombre }}</p>
                    </dt>
                    <dd class="mt-2 text-base text-gray-500">{{ $producto->descripcion }}</dd>
                    </div>
                @endforeach
                    
                </dl>
                </div>
            </div>
            </div>







        </div>
    </body>
</html>
