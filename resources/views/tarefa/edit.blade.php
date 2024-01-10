<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Tarefa') }}
        </h2>
    </x-slot>

    <x-container-md class="flex mx-2.5 justify-center">

        <x-form put :action="route('tarefa.update', $tarefa)" class="w-3/4">

            <x-input name="tarefa" label="Editar Tarefa" :value="$tarefa->tarefa"/>

            <x-btn.primary>Editar</x-btn.primary>
            <x-btn.secundary>Limpar</x-btn.secundary>

        </x-form>

    </x-container-md>


</x-app-layout>