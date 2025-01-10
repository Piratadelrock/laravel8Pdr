@extends('app')

@section('content')

<div class="container mx-auto p-6 bg-white shadow-md rounded-md">
  <h2 class="text-2xl font-bold mb-6 text-gray-800">
    {{ isset($ipsGuardado) ? 'Actualizar IPS' : 'Registrar IPS' }}
  </h2>

  <form action="{{ isset($ipsGuardado) ? route('ips.update', $ipsGuardado) : route('ips.store') }}" method="POST">
    @csrf

    @if(isset($ipsGuardado))
      @method('PUT')
    @endif

    <!-- Campo Nombre -->
    <div class="mb-4">
      <label for="nombre" class="block text-sm font-medium text-gray-800 p-2">Nombre</label>
      <input 
        type="text" 
        name="nombre" 
        id="nombre" 
        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-gray-800 p-2"
        value="{{ old('nombre', isset($ipsGuardado) ? $ipsGuardado->nombre : '') }}" 
        placeholder="Ingrese el nombre">
    </div>

    <!-- Botón de enviar -->
    <div class="flex justify-end">
      <button 
        type="submit" 
        class="px-6 py-2 bg-blue-600 text-white rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">
        {{ isset($ipsGuardado) ? 'Editar' : 'Registrar' }}
      </button>
    </div>
  </form>
</div>

@endsection
