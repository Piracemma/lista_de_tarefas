<x-container>

    <div>
        <form wire:submit="salvar">
            <div>
                <x-input-label value="Observação" />
                <x-textarea-input wire:model="observacao"></x-textarea-input>
            </div>
            <div class="mt-3">
                <x-input-label value="Fumei?" class="inline-block"/>
                <input wire:model="fumei" type="checkbox" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"/>
            </div>
            <x-primary-button type="submit" class="my-3">Enviar</x-primary-button>
        </form>
    </div>

    <div>
        <h3 class="text-2xl dark:text-white text-black">Registro:</h3>
        @foreach ($registros as $registro)
            <div class="bg-white shadow rounded m-2 inline-block p-3">
                <p class="text-xs"><span class="text-red-600">Observacao:</span> {{ $registro->observacao }}</p>
                <p class="text-xs"><span class="text-red-600">Fumei?:</span> {{ $registro->fumei ? 'sim' : 'nao' }}</p>
                <p class="text-xs"><span class="text-red-600">Data/hora:</span> {{ date_format($registro->created_at, 'd/m H:i') }}</p>
            </div>
        @endforeach
    </div>
    
</x-container>