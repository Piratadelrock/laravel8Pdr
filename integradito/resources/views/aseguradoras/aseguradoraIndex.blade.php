@extends('app')

@section('content')

<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Lista de Aseguradoras</h1>
    <button onclick="window.location.href='{{ route('aseguradoras.create') }}'" 
    class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
    Nueva Aseguradora
    </button>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md ">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 text-left font-semibold text-gray-700 ">ID</th>
                    <th class="px-4 py-2 text-left font-semibold text-gray-700">Nombre</th>
                    <th class="px-4 py-2 text-left font-semibold text-gray-700">Acciones</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($aseguradoras as $aseguradora)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="px-4 py-2 text-gray-800">{{ $aseguradora->id }}</td>
                        <td class="px-4 py-2 text-gray-800">{{ $aseguradora->nombre }}</td>
                        <td class="px-4 py-2">
                            <div class="flex space-x-2">
                            <!-- Acciones como Editar y Eliminar -->
                            <a href="{{ route('aseguradoras.edit', $aseguradora->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Editar</a>
                            <form action="{{ route('aseguradoras.destroy', $aseguradora->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button  class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600" type="submit">Eliminar</button>
                            </form>
                        </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>





@endsection