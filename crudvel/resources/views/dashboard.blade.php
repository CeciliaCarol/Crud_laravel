<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Página inicial') }}
        </h2>
    </x-slot>

</br>

    <div class="py-7 dark:bg-gray-800 max-w-6xl mx-auto sm:px-10 lg:px-10 rounded-md">
         <form action="{{ route('projeto.store') }}" method="POST">
                        @csrf
                        <x-text-input class="py-1 px-2" name="nome" placeholder="Nome" />
                        <x-text-input class="py-1 px-2"  name="descricao" placeholder="Descrição" />
                        <x-text-input class="py-1 px-2"  name="inicio" placeholder="Inicío" />
                        <x-text-input class="py-1 px-2"  name="termino" placeholder="Término" />
                        <x-text-input class="py-1 px-2"  name="responsavel" placeholder="Responsável" />
                        <x-primary-button class="">Salvar</x-primary-button>
                    </form>
</div>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
        
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <table class="min-w-full rounded-md">
          <thead>
            <tr>
              <th
                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-800">
                Nome</th>
              <th
                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-800">
                Descrição</th>
                <th
                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-800">
                Data de inicio</th>
                <th
                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-800">
                Data de termino</th>
                <th
                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-800">
                Responsável</th>
              <th class="px-6 py-3 text-sm text-left text-gray-500 border-b border-gray-200 bg-gray-800" colspan="3">
                Ação</th>
            </tr>
          </thead>
          @foreach (Auth::user()->myProjetos as $projeto)
          <tbody class="bg-gray-800" x-data="{showDelete:false, showEdit:false}">
            
            <tr>
            
              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                <div class="text-sm leading-5 text-white">{{$projeto ->nome}}
                </div>
              </td>

              <td class="px-6 py-4 whitespace-no-wrap border-b text-white border-gray-200">
              <div class="text-sm leading-5 text-white">{{$projeto ->descricao}}
                </div>
              </td>

              <td class="px-6 py-4 whitespace-no-wrap border-b text-white border-gray-200">
              <div class="text-sm leading-5 text-white">{{$projeto -> inicio}}
                </div>
              </td>

              <td class="px-6 py-4 whitespace-no-wrap border-b text-white border-gray-200">
              <div class="text-sm leading-5 text-white">{{$projeto -> termino}}
                </div>
              </td>

              <td class="px-6 py-4 whitespace-no-wrap border-b text-white border-gray-200">
              <div class="text-sm leading-5 text-white">{{$projeto -> responsavel}}
                </div>
              </td>

              <td class="font-medium text-center whitespace-no-wrap border-b border-gray-200 ">
              <div class="flex gap-2 flex-col">
                            <div>
                                <span class="cursor-pointer px-4 bg-blue-500 text-white rounded-full" @click="showDelete = true">Deletar</span>
                            </div>
                            <div>
                                <span class="cursor-pointer px-5 bg-blue-500 text-white rounded-full" @click="showEdit = true">Editar</span>
                            </div>
                        </div>
                        <template x-if="showDelete">
                            <div class="absolute top-0 bottom-0 left-0 right-0 bg-gray-600 bg-opacity-20 z-0 ">
                                <div class="w-96 bg-gray-500 p-4 absolute left-1/4 right-1/4 top-1/4  z-10 rounded-md">
                                    <h2 class="text-xl font-bold text-center">Tem certeza?</h2>
                                    <div class="flex justify-between mt-4">
                                        <form action="{{ route('projeto.destroy', $projeto) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button class="ml-12">Deletar</x-danger-button> 
                                            <x-primary-button @click="showDelete = false" class="m-7 w-50">Cancelar</x-primary-button>
                                        </form>
                                       
                                    </div>
                                </div>
                            </div>
                        </template>

                        <template x-if="showEdit">
                            <div class="absolute top-0 bottom-0 left-0 right-0 bg-gray-600 bg-opacity-20 z-0">
                                <div class="w-96 bg-gray-500 p-4 absolute left-1/4 right-1/4 top-1/4 z-10 rounded-md">
                                    <h2 class="text-xl font-bold text-center">Edite</h2>
                                        <form  class="my-4" action="{{ route('projeto.update', $projeto) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <x-text-input class="py-1 px-2 m-3" name="nome" placeholder="Description" value="{{$projeto ->nome}}" />
                                            <x-text-input class="py-1 px-2 m-3" name="descricao" placeholder="Expiration" value="{{$projeto ->descricao}}" />
                                            <x-text-input class="py-1 px-2 m-3"  name="inicio" placeholder="Inicío" value="{{$projeto ->inicio}}" />
                                            <x-text-input class="py-1 px-2 m-3"  name="termino" placeholder="Término" value="{{$projeto ->termino}}" />
                                            <x-text-input class="py-1 px-2 m-3"  name="responsavel" placeholder="Responsável" value="{{$projeto ->responsavel}}" />
                                        </br>
                                            <x-primary-button class=" text-center mt-2">Salvar</x-primary-button>
                                            <x-danger-button @click="showEdit = false" class="w-50 ">Cancelar</x-danger-button>
                                        </form>
                                        
                                </div>
                            </div>
                        </template>
            
          
                    </div>
              </td>
          </tbody>
        
              
                    @endforeach
                 </table>

                <!--    <form action="{{ route('projeto.store') }}" method="POST">
                        @csrf
                        <x-text-input name="description" placeholder="Description" />
                        <x-text-input name="expiration" placeholder="Expiration" />
                        <x-primary-button class="">Salvar</x-primary-button>
                    </form> -->
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
