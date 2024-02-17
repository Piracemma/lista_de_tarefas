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

    return to_route('dashboard');
});

Route::middleware('auth', 'verified')->group(function () {

    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('tarefa/criar', Tarefa\Create::class)->name('tarefa.create');
    Route::get('tarefa/editar/{tarefa}', Tarefa\Edit::class)->name('tarefa.edit');

    //Cadastro/Login
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
