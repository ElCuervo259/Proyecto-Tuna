<x-app-layout>
    @if(Auth::user()->rol == "Admin")
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administrar Tunas') }}
        </h2>
    </x-slot>
    @else
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mi Tuna') }}
        </h2>
    </x-slot>
    @endif
 
    <div class="py-6"> 
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">  
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-1 bg-white border-b border-gray-200">
                   <div class="container my-6 mx-auto px-4 md:px-12">



                    @if(Auth::user()->rol == "User")

                    <p class="w-2xl"> Usted Pertenece a la siguiente Tuna</p>

                    @endif
                     <div class="flex flex-wrap -mx-1 lg:-mx-2"> 

                        
                         
                        {{-- Mopstramos el boton de agregar tuna solo si el usuario es administrador --}}
                        @if(Auth::user()->rol == "Admin")
                        {{-- Boton Nuevo --}}
                        <div class="inline-block mr-2 mt-2">
                            <a href="{{ route('groups.create') }}">
                            <button type="button" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-blue-500 hover:bg-blue-600 hover:shadow-lg">Nueva Tuna</button>
                        </div></a>
                        @endif


                        

                        <div>
                            <div class="shadow overflow-hidden border border-gray-200 sm:rounded-lg m-6">
                          
                                  <table class="w-full divide-y divide-gray-200">
                                      <thead class="bg-gray-50">
                                          <tr>
                                              <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                              </th>
                          
                                              <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                  Nombre
                                              </th>

                                              @if(Auth::user()->rol == "Admin")
                                              <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                  Acciones
                                              </th>
                                              @endif
                                          </tr>
                                      </thead>
                                      @foreach( $groups as $group )
                                      <tbody class="bg-white text-xs divide-y divide-gray-200">
                                          <tr>
                                              <td class="px-2 py-4 whitespace-nowrap">
                                              </td>
                          
                                              <td class="px-2 py-4 whitespace-nowrap">
                                                {{ $group->name }}
                                              </td>

                                              @if(Auth::user()->rol == "Admin")
                                              <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                          
                                                  <div class="flex justify-start space-x-1">
                                                    <a href="{{route('groups.edit',$group)}}">
                                                      </button>
                                                      <button class="border-2 border-indigo-200 rounded-md p-1">
                                                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 text-gray-500">
                                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                          </svg>
                                                      </button>
                                                    </a>
                                                    
                                                      <form method="POST" action="{{route('groups.destroy', $group)}}">
                                                        @csrf
                                                        @method('delete')
                                                      {{-- <a href="{{route('groups.delete',['id' => $group->id])}}"> --}}
                                                      <button type="submit" class="border-2 border-red-200 rounded-md p-1">
                                                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 text-red-500">
                                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                          </svg>
                                                      </button>
                                                    </a>
                                                    </form>        
                                                  </div>
                                              </td>
                                              @endif
                                          </tr>
                                          @endforeach
                                    </div>
                                    {{$groups->links()}}
                                </div> 
                                <x-message-status class="mb-4" :status="session('status')" />
                                <!-- Validation Errors -->
                           <x-auth-validation-errors class="mb-4" :errors="$errors" /> 
                            </div>
                        </div>
                    </div>
                </div>
            </x-app-layout>
