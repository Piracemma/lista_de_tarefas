<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index(): View
    {

        return view('tarefa.index');

    }

    public function create(Request $request): RedirectResponse
    {
        $request->validate([
            'tarefa' => ['required', 'min:5', 'max:50', 'string'],
        ]);

        user()->tarefas()->create(['tarefa' => $request->tarefa]);

        return to_route('tarefa.index')->with('tarefa', 'Tarefa criada com Sucesso!!!');
    }
}
