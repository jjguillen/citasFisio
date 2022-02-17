<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            MIS SERVICIOS
            <a href="/dashboard/servicios/create"> 
            <x-button class="ml-3">
                {{ __('Nuevo') }}
            </x-button>
            </a>
        </h2>

        <div class="container mx-auto mt-5">
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                @if ($errors->any())
                    <div class="text-red-700">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('servicios.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Nombre -->
                    <div>
                        <x-label for="servicio" :value="__('Nombre')" />

                        <x-input id="servicio" class="block mt-1 w-full" type="text" name="servicio" :value="old('servicio')"  autofocus />
                    </div>

                    <!-- Imagen -->
                    <div class="mt-4">
                        <x-label for="imagen" :value="__('Imagen')" />
                        <x-input id="imagen" class="block mt-1 w-full" type="file" name="imagen" />
                   
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4">
                            {{ __('Nuevo servicio') }}
                        </x-button>
                    </div>
                </form>




                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
  document.getElementById("fecha").addEventListener("change", async function(e)  {
        let formData = new FormData();
		let res = await fetch("/dashboard/citas/horasDisp/"+this.value, {
			method: "GET",
		});
		let data = await res.text();
        document.getElementById("hora").innerHTML = data;
	});
</script>