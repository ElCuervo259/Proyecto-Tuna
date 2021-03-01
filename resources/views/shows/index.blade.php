<x-app-layout>
    @if(Auth::user()->rol == 'Admin' )
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administrar Actuaciones') }}
        </h2>
    </x-slot>
    @else
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis Actuaciones') }}
        </h2>
    </x-slot>
    @endif

    <div class="py-6"> 
        
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">  
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-1 bg-white border-b border-gray-200">
                   <div class="container my-6 mx-auto px-4 md:px-12">
                        @if(Auth::user()->rol == "User")

                        <p class="w-2xl"> Sus actuaciones son las siguientes:</p>

                        @endif
                     <div class="flex flex-wrap -mx-1 lg:-mx-2"> 

                        

                        @if(Auth::user()->rol == 'Admin' )
                        {{-- Boton Nuevo --}}
                        <div class="inline-block mr-2 mt-2">
                            <a href="{{ route('shows.create') }}">
                            <button type="button" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-blue-500 hover:bg-blue-600 hover:shadow-lg">Nueva Actuacion</button>
                        </div></a>
                        <div>
                        @endif
                            
                            <div class="shadow overflow-hidden border border-gray-200 sm:rounded-lg m-6">

                                <form method="GET" action="{{route('show.filtro')}}">
                                    <div class="relative text-gray-600">
                                      <input type="search" name="buscarpor" placeholder="Filtrar..." class="bg-white h-10 px-5 pr-10 rounded-full text-sm focus:outline-none">
                                      <button type="submit" class=" top-0 mt-3 mr-4">
                                        <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                                          <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
                                        </svg>
                                      </button>
                                    
      
                                    
                                      <span class="text-gray-700">Filtrar por...</span>
                                      <select  id="campo" name="campo" class="relative text-gray-600 rounded-full">
                                          <option value="day">Dia</option>
                                      </select>
                                    </label>
                                  </form>
                                </div>
                          
                                  <table class="w-full divide-y divide-gray-200">
                                      <thead class="bg-gray-50">
                                          <tr>
                                              <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                              </th>
                          
                                              <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                  Dia
                                              </th>

                                              <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Tuna
                                            </th>

                                            <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Teatro
                                            </th>

                                            @if(Auth::user()->rol == 'Admin' )
                                            <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Acciones
                                            </th>
                                            @endif
                                          </tr>
                                      </thead>
                                      @foreach( $shows as $show )
                                      <tbody class="bg-white text-xs divide-y divide-gray-200">
                                          <tr>
                                              <td class="px-2 py-4 whitespace-nowrap">
                                              </td>
                          
                                              <td class="px-2 py-4 whitespace-nowrap">
                                                {{ $show->day }}
                                              </td>

                                              <td class="px-2 py-4 whitespace-nowrap">
                                                {{ $show->group->name }}
                                              </td>

                                              <td class="px-2 py-4 whitespace-nowrap">
                                                {{ $show->theatre->name }}
                                              </td>
                         
                                              @if(Auth::user()->rol == 'Admin' )
                                              <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                          
                                                  <div class="flex justify-start space-x-1">
                                                    <a href="{{route('shows.edit',$show)}}">
                                                    </button>
                                                    <button class="border-2 border-indigo-200 rounded-md p-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 text-gray-500">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                        </svg>
                                                    </button>
                                                  </a>

                                                      <form method="POST" action="{{route('shows.destroy', $show)}}">
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
                                                  @endif
                                              </td>
                                          </tr>
                                          @endforeach
                                    </div>
                                    {{$shows->links()}}
                                </div> 
                            </div>
                            <x-message-status class="mb-4" :status="session('status')" />
                        </div>
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />  
                    </div>
                </div>
            </x-app-layout>