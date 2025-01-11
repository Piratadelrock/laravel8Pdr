@extends('app')

@section('content')

<div class="container mx-auto p-6 bg-white shadow-md rounded-md">
  <h2 class="text-2xl font-bold mb-6 text-gray-800">
    {{ isset($relacion) ? 'Actualizar IPS Aseguradora' : 'Relacionar IPS Aseguradora' }}
  </h2>

  <form action="{{ isset($relacion) ? route('ipsaseguradoras.update', $relacion->id) : route('ipsaseguradoras.store') }}" method="POST">
    @csrf

    @if(isset($relacion))
      @method('PUT')
    @endif

    <div class="mb-4">
      <label for="ips_id" class="block text-gray-700 font-semibold mb-2">Seleccione la IPS:</label>
      <select name="ips_id" id="ips_id" 
          class="w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
          @foreach ($ipsMaestra as $item)
              <option value="{{ $item->id }}">{{ $item->nombre }}</option>
          @endforeach
      </select>

  </div>
  
  <div class="mb-4">
      <label for="aseguradora_id" class="block text-gray-700 font-semibold mb-2">Seleccione la Aseguradora:</label>
      <select name="aseguradora_id" id="aseguradora_id" 
          class="w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
          @foreach ($aseguradoraMaestra as $item)
              <option value="{{ $item->id }}">{{ $item->nombre }}</option>
          @endforeach
      </select>
  </div>

    <!-- Botón de enviar -->
    <div class="flex justify-end">
      <button 
        type="submit" 
        class="px-6 py-2 bg-blue-600 text-white rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">
        {{ isset($relacion) ? 'Editar' : 'Registrar' }}
      </button>
    </div>
  </form>
</div>

@endsection
