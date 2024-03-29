<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TarefaController extends Controller
{
    public function index(): View
    {

        return view('tarefa.index');

    }

    public function create(): RedirectResponse
    {
        request()->validate([
            'tarefa' => ['required', 'min:5', 'max:50', 'string'],
        ]);

        user()->tarefas()->create(['tarefa' => request()->tarefa]);

        return to_route('tarefa.index')->with('tarefa', 'Tarefa criada com Sucesso!!!');
    }

    public function edit(Tarefa $tarefa): View
    {
        $this->authorize('edit', $tarefa);

        return view('tarefa.edit', compact('tarefa'));

    }

    public function update(Tarefa $tarefa): RedirectResponse
    {
        $this->authorize('update', $tarefa);

        request()->validate([
            'tarefa' => ['required', 'min:5', 'max:50', 'string'],
        ]);

        $tarefa->update(['tarefa' => request()->tarefa]);

        return to_route('dashboard');
    }

    public function check(Tarefa $tarefa): RedirectResponse
    {
        $this->authorize('check', $tarefa);

        if($tarefa->status === 0) {

            $tarefa->update([
                'status' => 1
            ]);

        } else if($tarefa->status === 1) {

            $tarefa->update([
                'status' => 0
            ]);

        }

        return to_route('dashboard');
    }

    public function delete(Tarefa $tarefa): RedirectResponse
    {
        $this->authorize('delete', $tarefa);

        $tarefa->delete();

        return to_route('dashboard');
    }

}
