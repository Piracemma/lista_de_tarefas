<?php

namespace App\Livewire\Tarefa;

use App\Models\Tarefa;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;

class Edit extends Component
{
    public Tarefa $tarefa;

    #[Validate(['required', 'min:5', 'max:50', 'string'], as:'tarefa')]
    public string $alterar = '';

    public function mount(Tarefa $tarefa): void
    {
        $this->tarefa = $tarefa;
        $this->alterar = $tarefa->tarefa;
    }

    public function render(): View
    {
        return view('livewire.tarefa.edit');
    }

    public function updated(string $attribute): void
    {
        $this->validateOnly($attribute);
    }

    public function update(): Redirector
    {
        
        $tarefa = $this->tarefa;
        $this->authorize('edit', $tarefa);
        $nova = $this->alterar;
        $this->validate();
        $tarefa->update(['tarefa' => $nova]);
        return to_route('dashboard')
            ->with('sucesso','Tarefa Alterada com Sucesso!!!');
    }
}
