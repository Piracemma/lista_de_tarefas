<?php

use App\Models\Tarefa;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

test('mostrar todas as tarefas no dashboard', function () {

    $user = User::factory()->create();
    actingAs($user);

    $tarefas = Tarefa::factory()->for($user)->count(10)->create();

    $request = get(route('dashboard'))->assertViewIs('dashboard');

    foreach ($tarefas as $tarefa) {

        $request->assertSee($tarefa->tarefa);

    }

});
