@extends('app')

@section('content')

<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Lista de IPS con su Aseguradora</h1>
    <button onclick="window.location.href='{{ route('ipsaseguradoras.create') }}'" 
    class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
    Relacionamiento de IPS CON ASEGURADORA
    </button>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md ">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 text-left font-semibold text-gray-700 ">ID</th>
                    <th class="px-4 py-2 text-left font-semibold text-gray-700">Nombre Ips</th>
                    <th class="px-4 py-2 text-left font-semibold text-gray-700">Nombre Aseguradora</th>
                    <th class="px-4 py-2 text-left font-semibold text-gray-700">Acciones</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($ipsaseguradora as $iar)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="px-4 py-2 text-gray-800">{{ $iar->id }}</td>
                        <td class="px-4 py-2 text-gray-800">{{ $iar->ips->nombre }}</td>
                        <td class="px-4 py-2 text-gray-800">{{ $iar->aseguradoras->nombre }}</td>
                        <td class="px-4 py-2">
                            <div class="flex space-x-2">
                            <!-- Acciones como Editar y Eliminar -->
                            <a href="{{ route('ipsaseguradoras.edit', $iar->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Editar</a>
                            <form action="{{ route('ipsaseguradoras.destroy', $iar->id) }}" method="POST" style="display:inline-block;"  onsubmit="return confirm('¿Estás seguro de eliminar esta relación?')">
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