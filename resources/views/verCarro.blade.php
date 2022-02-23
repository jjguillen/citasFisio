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
                    <a href="{{ url('/tienda/verCarro') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
                        <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="mt-2 w-5 h-5 text-gray-400">
                            <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </a>
                </div>
            @endif

            <div class="container mx-auto mt-10">
                <div class="flex shadow-md my-10">
                <div class="w-3/4 bg-white px-10 py-10">
                    <div class="flex justify-between border-b pb-8">
                    <h1 class="font-semibold text-2xl">Carrito de la compra</h1>
                    <h2 class="font-semibold text-2xl">{{ $items->count() }} Productos</h2>
                    </div>
                    <div class="flex mt-10 mb-5">
                    <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Detalle</h3>
                    <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Cantidad</h3>
                    <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Precio</h3>
                    <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Total</h3>
                    </div>

                    @foreach($items as $item)
                    <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
                    <div class="flex w-2/5"> <!-- product -->
                        <div class="w-20">
                        <img class="h-24" src="https://drive.google.com/uc?id=18KkAVkGFvaGNqPy2DIvTqmUH_nk39o3z" alt="">
                        </div>
                        <div class="flex flex-col justify-between ml-4 flex-grow">
                        <span class="font-bold text-sm">{{ $item->name }}</span>
                        <a href="#" class="font-semibold hover:text-red-500 text-gray-500 text-xs">Quitar</a>
                        </div>
                    </div>
                    <div class="flex justify-center w-1/5">
                        <svg class="fill-current text-gray-600 w-3" viewBox="0 0 448 512"><path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/>
                        </svg>

                        <input class="mx-2 border text-sm text-center w-8" type="text" value="{{ $item->quantity  }}">

                        <svg class="fill-current text-gray-600 w-3" viewBox="0 0 448 512">
                        <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/>
                        </svg>
                    </div>
                    <span class="text-center w-1/5 font-semibold text-sm">{{ $item->price }}</span>
                    <span class="text-center w-1/5 font-semibold text-sm">{{ $item->price * $item->quantity }}</span>
                    </div>
                    @endforeach

                    <a href="#" class="flex font-semibold text-indigo-600 text-sm mt-10">
                
                    <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512"><path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/></svg>
                    Continuar comprando
                    </a>
                </div>

                <div id="summary" class="w-1/4 px-8 py-10">
                    <h1 class="font-semibold text-2xl border-b pb-8">Resumen pedido</h1>
                    <div class="flex justify-between mt-10 mb-5">
                    <span class="font-semibold text-sm uppercase">Productos {{ $item->quantity }}</span>
                    <span class="font-semibold text-sm">{{ Cart::getTotal() }}€</span>
                    </div>
                    <div>
                    <label class="font-medium inline-block mb-3 text-sm uppercase">Envío</label>
                    <select class="block p-2 text-gray-600 w-full text-sm">
                        <option>Envío estándar - 10.00€</option>
                    </select>
                    </div>
                    <div class="border-t mt-8">
                    <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                        <span>Total</span>
                        <span>{{ Cart::getTotal()+10 }}€</span>
                    </div>
                    <button class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full">Checkout</button>
                    </div>
                </div>

                </div>
            </div>


        </div>
    </body>
</html>
