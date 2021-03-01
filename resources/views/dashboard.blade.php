<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inicio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <!-- Información operación -->
                   <x-message-status class="mb-4" :status="session('status')" /> 

                   @if(Auth::user()->rol == 'Admin')
                    <p class="w-2xl"> Bienvenido Administrador {{Auth::user()->name}}</p>
                   @else
                    <p class="w-2xl"> Bienvenido Usuario {{Auth::user()->name}}</p> 
                <br>
                    <p class="w-xl"> ¡ {{Auth::user()->name}} No olvides completar tu perfil en la sección "Mi Perfil" !</p> 
                   @endif
                   <x-imagen-principal class="block h-10 w-auto fill-current text-gray-600" />
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
