<?php

namespace App\Livewire;

use Livewire\Component;

class Fumar extends Component
{
    public string $observacao = '';

    public bool $fumei = true;

    public float $quantidade = 0;

    public function render()
    {
        return view('livewire.fumar', [
            'registros' => user()->fumar()->orderBy('created_at', 'desc')->get()
        ]);
    }

    public function salvar()
    {
        user()->fumar()->create([
            'quantidade' => $this->quantidade,
            'observacao' => $this->observacao,
            'fumei' => $this->fumei
        ]);
        $this->redirect('/dashboard');
    }
}
