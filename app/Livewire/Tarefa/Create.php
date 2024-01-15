<?php

namespace App\Livewire\Tarefa;

use App\Livewire\Alertsuccess;
use App\Models\Tarefa;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{
    #[Validate(['required', 'min:5', 'max:50', 'string'])]
    public string $tarefa = '';

    public function updated(string $attribute):void
    {
        $this->validateOnly($attribute);
    }

    public function render(): View
    {
        return view('livewire.tarefa.create');
    }

    public function save(): RedirectResponse
    {
        $this->validate();
        user()->tarefas()->create(['tarefa' => $this->tarefa]);
        
        return to_route('dashboard')
            ->with('sucesso','Tarefa Criada com Sucesso!!!');
        
    }
}
