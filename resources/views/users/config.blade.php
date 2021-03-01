<x-app-layout>
   <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ __('Configuración de mi cuenta') }}
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
               
                      
                      <form method="POST" action="{{ route('users.updateperfil')}}" enctype="multipart/form-data">
                          @csrf
                          
                          @if(Auth::user()->rol == "Admin")
                          <x-label for="rol" :value="__('Rol')" />
                          <label class="inline-col items-center mt-3">
                            <input type="radio" id ="rol" value="Admin" name="rol" class="form-radio h-5 w-5 text-gray-600" checked><span class="ml-2 text-gray-700">Admin</span>
                            <input type="radio" id="rol" value="User" name="rol" class="form-radio h-5 w-5 text-gray-600" ><span class="ml-2 text-gray-700">User</span>
                        </label>
                        @else
                        <x-label for="rol" :value="__('Rol')" />
                          <label class="inline-col items-center mt-3">
                            <input type="radio" id="rol" value="User" name="rol" class="form-radio h-5 w-5 text-gray-600" checked><span class="ml-2 text-gray-700">User</span>
                        </label>
                        @endif

                          <!-- Nombre -->
                          <div class="mt-4">
                             <x-label for="name" :value="__('Nombre')" />
                             <x-input id="name" type="text" name="name"  :value="Auth::user()->name" class="w-full h-10 px-3 py-2 text-base text-gray-700 placeholder-gray-600 border rounded-lg focus:shadow-outline" required autofocus/>
                          </div> 
                          <!-- Mote -->
                          <div class="mt-4">
                            <x-label for="mote" :value="__('Mote')" />
                            <x-input id="mote" type="text" name="mote" :value="Auth::user()->mote" class="w-full h-10 px-3 py-2 text-base text-gray-700 placeholder-gray-600 border rounded-lg focus:shadow-outline" required autofocus/>
                         </div>
                         <!-- rango -->
                          <div class="mt-4">
                            <x-label for="mote" :value="__('Rango')" />
                            <x-input id="rango" type="text" name="rango" :value="Auth::user()->rango" class="w-full h-10 px-3 py-2 text-base text-gray-700 placeholder-gray-600 border rounded-lg focus:shadow-outline" required autofocus/>
                         </div>


                         
                        {{-- Select con los valores de group --}}
                         <label class="block">
                            <span class="text-gray-700">Tuna</span>
                            <select  id="group_id" name="group_id" class="form-select block w-full mt-1">
                                @foreach( $groups as $group ) 
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            </select>
                          </label>

                          <!-- Imagen -->
                         <div class="mt-4">
                            <x-label for="image_path" :value="__('Imagen')" />
                            <x-input id="image_path" type="file" name="image_path" class="w-full h-10 px-3 py-2 text-base text-gray-700 placeholder-gray-600 border rounded-lg focus:shadow-outline"  autofocus/>
                         </div> 



                         


                         <!--email -->
                         <div class="mt-4">
                            <x-label for="email" :value="__('Email')" />
                            <x-input id="email" type="email" name="email" :value="Auth::user()->email" class="w-full h-10 px-3 py-2 text-base text-gray-700 placeholder-gray-600 border rounded-lg focus:shadow-outline" required autofocus/>
                         </div>
                         
               
                                                 
                          <div class="flex items-center justify-end mt-4">
               
                              <x-button class="ml-4">
                                  {{ __('Guardar Cambios') }}
                              </x-button>
                          </div>
                      </form>              
                </div>
            </div>
        </div>
    </div>
 </x-app-layout>