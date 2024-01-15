<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TarefaController;
use App\Livewire\Dashboard;
use App\Livewire\Tarefa;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    if (app()->isLocal()) {

        auth()->loginUsingId(1);

        return to_route('dashboard');

    }

    return view('welcome');
});

Route::middleware('auth', 'verified')->group(function () {

    /*Route::get('/dashboard', DashboardController::class)->name('dashboard');

    //Tarefas
    Route::post('/tarefa/create', [TarefaController::class, 'create'])->name('tarefa.create');
    Route::get('/tarefa', [TarefaController::class, 'index'])->name('tarefa.index');
    Route::put('/tarefa/{tarefa}', [TarefaController::class, 'update'])->name('tarefa.update');
    Route::get('/tarefa/{tarefa}/edit', [TarefaController::class, 'edit'])->name('tarefa.edit');
    Route::patch('/tarefa/{tarefa}', [TarefaController::class, 'check'])->name('tarefa.check');
    Route::delete('/tarefa/{tarefa}', [TarefaController::class, 'delete'])->name('tarefa.delete');*/
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('tarefa/criar', Tarefa\Create::class)->name('tarefa.create');
    Route::get('tarefa/editar/{tarefa}', Tarefa\Edit::class)->name('tarefa.edit');

    //Cadastro/Login
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
