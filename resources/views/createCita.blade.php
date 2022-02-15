<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            MIS CITAS 
            <a href="/dashboard/citas/create"> 
            <x-button class="ml-3">
                {{ __('Nueva') }}
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

                <form method="POST" action="{{ route('citas.store') }}">
                    @csrf

                    <!-- Fecha -->
                    <div>
                        <x-label for="fecha" :value="__('Fecha')" />

                        <x-input id="fecha" class="block mt-1 w-full" type="date" name="fecha" :value="old('name')" required autofocus />
                    </div>

                    <!-- Hora -->
                    <div class="mt-4">
                        <x-label for="hora" :value="__('Hora')" />
                        <select name="hora" id="hora" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="10">10:00</option>
                            <option value="11">11:00</option>
                            <option value="12">12:00</option>
                            <option value="13">13:00</option>
                            <option value="17">17:00</option>
                            <option value="18">18:00</option>
                            <option value="19">19:00</option>
                            <option value="20">20:00</option>
                        </select>
                    </div>

                    <!-- Observaciones -->
                    <div class="mt-4"> 
                        <x-label for="observaciones" :value="__('Observaciones')" />

                        <textarea name="observaciones" id="observaciones" cols="20" rows="3" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                    </div>

                     <!-- Servicio -->
                     <div class="mt-4">
                        <x-label for="servicio" :value="__('Servicio')" />
                        <select name="servicio" id="servicio" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @foreach($servicios as $servicio)
                                <option value="{{ $servicio->id }}">{{ $servicio->servicio }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4">
                            {{ __('Nueva cita') }}
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