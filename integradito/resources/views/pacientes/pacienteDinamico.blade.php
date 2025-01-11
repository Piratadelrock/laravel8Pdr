@extends('app')

@section('content')

<div class="container mx-auto p-4">
  <h2 class="text-2xl font-bold mb-4 text-gray-800">{{ isset($PacienteGuardao) ? 'Actualizar Paciente' : 'Registrar Paciente' }}</h2>
  <form action="{{ isset($PacienteGuardao) ? route('pacientes.update', $PacienteGuardao) : route('pacientes.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md max-w-md mx-auto">
    @csrf <!-- Token de protección contra ataques CSRF -->
    
    @if(isset($PacienteGuardao))
        @method('PUT')
    @endif

    <div class="mb-4">
      <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
      <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
       name="nombre" id="nombre" 
      value="{{ old('nombre',isset($PacienteGuardao) ? $PacienteGuardao->nombre : '' ) }}" placeholder="Ingrese el nombre"  >
  </div>

    <div class="mb-4">
      <label for="fecha_nacimiento" class="block text-sm font-medium text-gray-700 mb-1">Fecha de nacimiento</label>
      <input type="date"  class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required  name="fecha_nacimiento" id="fecha_nacimiento"  
      value="{{ old('fecha_nacimiento', isset($PacienteGuardao) ? $PacienteGuardao->fecha_nacimiento : '' )}}">
    </div>
    <div class="mb-4">
      <label for="documento_identidad" class="form-label">Numero de documento</label>
      <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="Ingrese el documento" 
       name="documento_identidad" id="documento_identidad" 
      value="{{ old('documento_identidad',isset($PacienteGuardao) ? $PacienteGuardao->documento_identidad : '') }}">
    </div>
    <div class="mb-4">
      <label for="direccion" class="block text-sm font-medium text-gray-700 mb-1">direccion</label>
      <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="Ingrese la dirección"  name="direccion" id="direccion" 
      value="{{ old('direccion', isset($PacienteGuardao) ? $PacienteGuardao->direccion : '') }}">
    </div>
    <div class="mb-4">
      <label for="telefono" class="block text-sm font-medium text-gray-700 mb-1">telefono</label>
      <input type="text" name="telefono" id="telefono" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" 
      value="{{ old('telefono', isset($PacienteGuardao) ? $PacienteGuardao->telefono : '')}}" placeholder="Ingrese el teléfono"  >
    </div>
    <div class="mb-4">
      <label for="correo_electronico" class="block text-sm font-medium text-gray-700 mb-1">Correo electronico</label>
      <input type="text"  class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" name="correo_electronico" id="correo_electronico" 
      aria-describedby="nameHelp" 
      value="{{ old('correo_electronico',isset($PacienteGuardao) ? $PacienteGuardao->correo_electronico : '') }}" placeholder="Ingrese el correo" >
    </div>


    <div class="mb-4">
      <label for="ips_id" class="block text-gray-700 font-semibold mb-2">Seleccione la IPS:</label>
      <select name="ips_id" id="ips_id" 
          class="w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
          @foreach ($ipsMaestra as $item)
              <option value="{{ $item->id }}" 
                {{ isset($PacienteGuardao) && $PacienteGuardao->ips_id == $item->id ? 'selected' : '' }}>
                {{ $item->nombre }}
            </option>
          @endforeach
      </select>

      
    </div>

 <!-- Botón de Envío -->
 <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
 {{ isset($PacienteGuardao) ? 'Editar' : 'Registrar' }}</button>
  </form>
</div>



@endsection