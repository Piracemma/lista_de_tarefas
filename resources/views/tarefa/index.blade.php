<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Criar Tarefa') }}
        </h2>
    </x-slot>

    <x-container>
        
        @if (session('tarefa'))
            <x-container-md class="flex mx-2.5 justify-center">

                <div id="alert-3" class="flex items-center p-4 mb-4 w-3/4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    <div class="ms-3 text-sm font-medium">
                        {{ session('tarefa') }}
                    </div>
                    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    </button>
                </div>  

            </x-container-md>
        @endif

        <x-container-md class="flex mx-2.5 justify-center">

            <x-form post :action="route('tarefa.create')" class="w-3/4">

                <x-input name="tarefa" label="Nova Tarefa" placeholder="Ex: Lavar o carro" :value="old('tarefa')" />

                <x-btn.primary>Criar</x-btn.primary>
                <x-btn.secundary>Limpar</x-btn.secundary>

            </x-form>

        </x-container-md>

    </x-container>
    
</x-app-layout>