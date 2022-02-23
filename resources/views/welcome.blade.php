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
                </div>
            @endif

            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="py-12 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:text-center">
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">CitasFisio</p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">Reserva tu cita para un tratamiento que dejará fino, o compra productos para llevar el espíritu a tu casa.</p>
                </div>

                <div class="mt-10">
                <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                   
                @foreach($servicios as $servicio)
                    <div class="relative">
                    <dt>
                        <div class="flex items-center justify-center h-52 w-52 rounded-md  text-white">
                        <!-- Heroicon name: outline/globe-alt -->
                        <img src='{{ $servicio->imagen }}'>
                        </div>
                        <p class="ml-16 text-lg leading-6 font-medium text-gray-900">{{ $servicio->servicio }}</p>
                    </dt>
                    </div>
                @endforeach
                    
                </dl>
                </div>
            </div>
            </div>







        </div>
    </body>
</html>
