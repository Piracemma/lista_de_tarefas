<x-container>    

    <x-container-md class="flex mx-2.5 justify-center">

        <form class="w-3/4" wire:submit="save">

            <x-input name="tarefa" wire:model.live="tarefa" label="Nova Tarefa" placeholder="Ex: Lavar o carro" :value="old('tarefa')" />

            <x-btn.primary>Criar</x-btn.primary>
            <x-btn.secundary>Limpar</x-btn.secundary>

        </form>

    </x-container-md>

</x-container>