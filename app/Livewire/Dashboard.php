<?php

namespace App\Livewire;

use App\Models\Tarefa;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Dashboard extends Component
{
    /**
     * @var array<mixed, Tarefa>
     */
    public array $tarefas;
    
    public function mount() : void
    {

        $this->tarefas = user()->tarefas->all();
        
    }
    public function render(): View
    {
        return view('livewire.dashboard');
    }
}
