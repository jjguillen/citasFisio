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
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

<!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hora</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Observaciones</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Servicio</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200" id='mitabla'>
            @foreach($citas as $cita)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ $cita->fecha}}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ $cita->hora }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold"> {{ $cita->observaciones}} </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $cita->servicio->servicio }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="/dashboard/citas/{{ $cita->id }}/edit" class="text-indigo-600 hover:text-indigo-900">
                  <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 rounded">
                    Edit
                  </button>
                </a>
                <a href="/dashboard/citas/delete/{{ $cita->id }}" data-method='delete' class="text-indigo-600 hover:text-indigo-900">
                  <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 rounded">
                    Delete
                  </button>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

        {{ $citas->links() }}
      </div>
    </div>
  </div>
</div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>

