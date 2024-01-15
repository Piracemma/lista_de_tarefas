<x-container-md class="flex mx-2.5 justify-center">

    <form wire:submit="update" class="w-3/4">

        <x-input name="alterar" label="Editar Tarefa" wire:model.live="alterar"/>

        <x-btn.primary>Editar</x-btn.primary>
        <x-btn.secundary>Limpar</x-btn.secundary>

    </form>

</x-container-md>