<x-container>

    <div>
        <form wire:submit="salvar">

            <div>
                <x-input-label value="Situação Ocorrida" />
                <x-textarea-input wire:model="situacao"></x-textarea-input>
            </div>

            <div>
                <x-input-label value="Pensamento Gerado" />
                <x-textarea-input wire:model="pensamento"></x-textarea-input>
            </div>

            <div>
                <x-input-label value="Emoção Causada" />
                <x-textarea-input wire:model="emocao"></x-textarea-input>
            </div>

            <div>
                <x-input-label value="Comportamento Feito e Depois" />
                <x-textarea-input wire:model="comportamento"></x-textarea-input>
            </div>        

            
            <x-primary-button type="submit" class="my-3">Enviar</x-primary-button>
        </form>
    </div>

    <div>
        <h3 class="text-2xl dark:text-white text-black">Registro:</h3>
        
            @if($registros->isNotEmpty())            
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Data/Hora
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Situacao
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Pensamento
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Emocao
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Comportamento
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($registros as $registro)
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                        {{ date_format($registro->created_at, 'd/m H:i') }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $registro->situacao }}
                                    </td>
                                    <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                        {{ $registro->pensamento }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $registro->emocao }}
                                    </td>
                                    <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                        {{ $registro->comportamento }}
                                    </td>
                                </tr>
                                @endforeach
                            
                        </tbody>
                    </table>
                </div>
            @endif
    </div>
    
</x-container>