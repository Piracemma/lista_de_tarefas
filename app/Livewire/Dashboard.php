<?php

namespace App\Livewire;

use App\Models\Tarefa;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;
    /**
     * @var array<mixed, Tarefa>
     */
    //public array $tarefas;
    
    public function mount() : void
    {

        // $this->tarefas = user()->tarefas->all();
        
    }
    public function render(): View
    {
        return view('livewire.dashboard', [
            'tarefas' => Tarefa::paginate(5)
        ]);
    }
}
