<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TarefaController;
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

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //Tarefas
    Route::post('/tarefa/create', [TarefaController::class, 'create'])->name('tarefa.create');
    Route::get('/tarefa', [TarefaController::class, 'index'])->name('tarefa.index');
    Route::put('/tarefa/{tarefa}', [TarefaController::class, 'update'])->name('tarefa.update');

    //Cadastro/Login
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
