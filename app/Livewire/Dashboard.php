<?php

namespace App\Livewire;

use App\Models\Fumar;
use App\Models\Tarefa;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Date;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    
    public function render(): View
    {
        return view('livewire.dashboard',[
            'fumar' => Fumar::query()->where('user_id',user()->id)->where('fumei', true)->whereBetween('created_at', [date('Y-m-d H:i:s', mktime(date('H'),date('i'),date('s'),date('m'),date('d')-8,date('Y'))), date('Y-m-d H:i:s')])->sum('quantidade')
        ]);
    }
}
