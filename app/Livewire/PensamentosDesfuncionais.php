<?php

namespace App\Livewire;

use App\Models\Pensamento;
use Livewire\Component;

class PensamentosDesfuncionais extends Component
{
    public string $situacao = '';
    public string $pensamento = '';
    public string $emocao = '';
    public string $comportamento = '';

    public function render()
    {
        return view('livewire.pensamentos-desfuncionais',[
            'registros' => Pensamento::query()->where('user_id',user()->id)->whereBetween('created_at', [date('Y-m-d H:i:s', mktime(date('H'),date('i'),date('s'),date('m'),date('d')-30,date('Y'))), date('Y-m-d H:i:s')])->get()
        ]);
    }

    public function salvar()
    {
        user()->pensamentos()->create([
            'situacao' => $this->situacao,
            'pensamento' => $this->pensamento,
            'emocao' => $this->emocao,
            'comportamento' => $this->comportamento
        ]);
        $this->redirect('/dashboard');
    }
}
