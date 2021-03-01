<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Actuacion') }}
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
               
                      <form method="POST" action="{{ route('shows.update',$show)}}" enctype="multipart/form-data">
                          @csrf
                          @method('put')

                          {{-- Select con los valores de group --}}
                         <label class="block">
                            <span class="text-gray-700">Dia</span>
                            <select  id="day" name="day" class="form-select block w-full mt-1">
                                <option value="Lunes">Lunes</option>
                                <option value="Martes">Martes</option>
                                <option value="Miercoles">Miercoles</option>
                                <option value="Jueves">Jueves</option>
                                <option value="Viernes">Viernes</option>
                            </select>
                          </label>


                          {{-- Select con los valores de  --}}
                         <label class="block">
                            <span class="text-gray-700">Tuna</span>
                            <select  id="group_id" name="group_id" class="form-select block w-full mt-1">
                                @foreach( $groups as $group ) 
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            </select>
                          </label>


                          {{-- Select con los valores de  --}}
                         <label class="block">
                            <span class="text-gray-700">Teatro</span>
                            <select  id="theatre_id" name="theatre_id" class="form-select block w-full mt-1">
                                @foreach( $theatres as $theatre ) 
                                <option value="{{ $theatre->id }}">{{ $theatre->name }}</option>
                                @endforeach
                            </select>
                          </label>

                                                                    
                          <div class="flex items-center justify-end mt-4">
               
                              <x-button class="ml-4">
                                  {{ __('Editar Actuacion') }}
                              </x-button>
                          </div>
                      </form>              
                </div>
            </div>
        </div>
    </div>
 </x-app-layout>