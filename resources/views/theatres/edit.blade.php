<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Teatro') }}
        </h2>
    </x-slot>
 
    <div class="py-6"> 
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">    
                      <!-- Información operación -->
                      <x-message-status class="mb-4" :status="session('status')" />         
                      <!-- Validation Errors -->
                      <x-auth-validation-errors class="mb-4" :errors="$errors" />
               
                      <form method="POST" action="{{ route('theatres.update',$theatre)}}" enctype="multipart/form-data">
                          @csrf
                          @method('put')
                        
                          <!-- Nombre -->
                          <div class="mt-4">
                             <x-label for="name" :value="__('Nombre')" />
                             <x-input id="name" type="text" name="name" value="{{$theatre->name}}" class="w-full h-10 px-3 py-2 text-base text-gray-700 placeholder-gray-600 border rounded-lg focus:shadow-outline" required autofocus/>
                          </div> 

                          {{-- !-- address --> --}}
                          <div class="mt-4">
                             <x-label for="address" :value="__('Direccion')" />
                             <x-input id="address" type="text" name="address" value="{{$theatre->address}}" class="w-full h-10 px-3 py-2 text-base text-gray-700 placeholder-gray-600 border rounded-lg focus:shadow-outline" required autofocus/>
                          </div> 

                          {{-- !-- Capacidad --> --}}
                          <div class="mt-4">
                            <x-label for="capacidad" :value="__('Capacidad')" />
                            <x-input id="capacidad" type="text" name="capacidad" value="{{$theatre->capacidad}}" class="w-full h-10 px-3 py-2 text-base text-gray-700 placeholder-gray-600 border rounded-lg focus:shadow-outline" required autofocus/>
                         </div>

                         <!-- Imagen -->
                         <div class="mt-4">
                            <x-label for="image_path" :value="__('Imagen')" />
                            <x-input id="image_path" type="file" name="image_path" class="w-full h-10 px-3 py-2 text-base text-gray-700 placeholder-gray-600 border rounded-lg focus:shadow-outline"  autofocus/>
                         </div>
               
                                                 
                          <div class="flex items-center justify-end mt-4">
               
                              <x-button class="ml-4">
                                  {{ __('Editar Teatro') }}
                              </x-button>
                          </div>
                      </form>              
                </div>
            </div>
        </div>
    </div>
 </x-app-layout>