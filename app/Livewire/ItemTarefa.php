<?php

namespace App\Livewire;

use App\Models\Tarefa;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;

class ItemTarefa extends Component
{
    public Tarefa $tarefa;

    public function mount(Tarefa $tarefa): void
    {
        $this->tarefa = $tarefa;
    }

    public function finalizar(): void
    {
        $tarefa = $this->tarefa;
        $this->authorize('check', $tarefa);
        $tarefa->update(['status' => 1]);
        $this->tarefa->fresh();
    }

    public function estornar(): void
    {
        $tarefa = $this->tarefa;
        $this->authorize('check', $tarefa);
        $tarefa->update(['status' => 0]);
        $this->tarefa->fresh();
    }

    public function excluir()
    {
        $tarefa = $this->tarefa;
        $this->authorize('delete', $tarefa);
        $tarefa->delete();

        return to_route('dashboard')
            ->with('sucesso','Tarefa Excluida com Sucesso!!!');
    }

    public function render(): View
    {
        return view('livewire.item-tarefa');
    }

    
}
