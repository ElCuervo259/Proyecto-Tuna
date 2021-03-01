
    <x-app-layout>

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Comprueba el tiempo en la provincia') }}
            </h2>
        </x-slot>

        <div class="py-6"> 
            <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">  
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-1 bg-white border-b border-gray-200">
                       <div class="container my-6 mx-auto px-4 md:px-12">

                         <div class="flex flex-wrap -mx-1 lg:-mx-2"> 
    
                            
                             

                                <div class="shadow overflow-hidden border border-gray-200 sm:rounded-lg m-6">
                              
                                      <table class="w-full divide-y divide-gray-200">
                                          <thead class="bg-gray-50">
                                              <tr>
                                                  <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                  </th>
                              
                                                  <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                      Ciudad
                                                  </th>
                                                  <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                      Estado del cielo
                                                  </th>
                                                  <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Temperatura Máxima
                                                </th>
                                                <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Temperatura Mínima
                                                </th>
                                                  
                                              </tr>
                                          </thead>
                                          @foreach( $datos as $dato )
                                          <tbody class="bg-white text-xs divide-y divide-gray-200">
                                              <tr>
                                                  <td class="px-2 py-4 whitespace-nowrap">
                                                  </td>
                              
                                                  <td class="px-2 py-4 whitespace-nowrap">
                                                    {{ $dato['nombre'] }}
                                                  </td>
                                                  <td class="px-2 py-4 whitespace-nowrap">
                                                    {{ $dato['cielo'] }}
                                                  </td>
                                                  <td class="px-2 py-4 whitespace-nowrap">
                                                    {{ $dato['tmax'] }}°C
                                                  </td>
                                                  <td class="px-2 py-4 whitespace-nowrap">
                                                    {{ $dato['tmin'] }}°C
                                                  </td>
                                              </tr>
                                              @endforeach
                                        </div>
                                        
                                    </div> 
                                    
                                </div>
                            
                        </div>
                    </div>
                </x-app-layout>



