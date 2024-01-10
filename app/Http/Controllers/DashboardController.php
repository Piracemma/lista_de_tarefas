<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $tarefas = user()->tarefas->all();

        return view('dashboard', compact('tarefas'));
    }
}
