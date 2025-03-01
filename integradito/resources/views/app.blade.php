<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Integradito</title>
    <link rel="icon" type="image/x-icon" href="https://img.icons8.com/doodle/48/internet--v1.png">

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> --}}

    {{-- <link href="{{ mix('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    

</head>

<body>
   
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
          <div class="relative flex h-16 items-center justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
              <!-- Mobile menu button-->
              <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                <span class="absolute -inset-0.5"></span>
                <span class="sr-only">Open main menu</span>
                <!--
                  Icon when menu is closed.
      
                  Menu open: "hidden", Menu closed: "block"
                -->
                <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
                <!--
                  Icon when menu is open.
      
                  Menu open: "block", Menu closed: "hidden"
                -->
                <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
              <div class="flex shrink-0 items-center">
                {{-- <img class="h-8 w-auto" src="https://upload.wikimedia.org/wikipedia/commons/d/d5/Tailwind_CSS_Logo.svg" alt="Integradito"> --}}
              <img src="data:image/png;base64,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" alt="integradito" width="50" height="50">
              </div>
              <div class="hidden sm:ml-6 sm:block">
                <div class="flex space-x-4">
                  <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                  <a href="{{ route('pacientes.index') }}" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">Pacientes</a>
                  <a href="{{ route('ips.index') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">IPS</a>
                  <a href="{{ route('aseguradoras.index') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Aseguradoras</a>
                  <a href="{{ route('ipsaseguradoras.index') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Ips Aseguradoras</a>
                </div>
              </div>
            </div>
           
            </div>
          </div>
        </div>
      
        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="sm:hidden" id="mobile-menu">
          <div class="space-y-1 px-2 pb-3 pt-2">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="{{ route('pacientes.index') }}" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white" aria-current="page">Integradito</a>
            <a href="{{ route('pacientes.index') }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Pacientes</a>
            <a href="{{ route('ips.index') }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">IPS</a>
            <a href="{{ route('aseguradoras.index') }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Aseguradoras</a>
          </div>
        </div>
      </nav>
      

    @yield('content')
    
    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">¡Éxito!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif
</body>

</html>