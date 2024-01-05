<?php

use App\Models\Tarefa;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\put;

test('Validar se foi o usuario que crio a pergunta que está editando ela', function () {

    $userRight = User::factory()->create();

    $userWronge = User::factory()->create();

    $tarefa = Tarefa::factory()->for($userRight)->create(['tarefa' => 'Lavar o carro']);

    actingAs($userWronge);

    put(route('tarefa.update', $tarefa), ['tarefa' => 'Limpar a casa'])->assertForbidden();

    assertDatabaseMissing('tarefas', ['tarefa' => 'Limpar a casa']);

    actingAs($userRight);

    put(route('tarefa.update', $tarefa), ['tarefa' => 'Limpar a casa'])->assertRedirect(route('dashboard'));

    assertDatabaseHas('tarefas', ['tarefa' => 'Limpar a casa']);

});

test('validar se cumpre os mesmo requisitos da criacao', function () {

    $user = User::factory()->create();
    actingAs($user);

    $tarefa = Tarefa::factory()->for($user)->create(['tarefa' => 'Lavar o Carro']);

    //required
    $request = put(route('tarefa.update', $tarefa), ['tarefa' => '']);

    $request->assertSessionHasErrors([
        'tarefa' => __('validation.required', ['attribute' => 'tarefa']),
    ]);

    //string
    $request = put(route('tarefa.update', $tarefa), ['tarefa' => 1321]);

    $request->assertSessionHasErrors([
        'tarefa' => __('validation.string', ['attribute' => 'tarefa']),
    ]);

    //min:5
    $request = put(route('tarefa.update', $tarefa), ['tarefa' => '123']);

    $request->assertSessionHasErrors([
        'tarefa' => __('validation.min.string', ['attribute' => 'tarefa', 'min' => 5]),
    ]);

    //max:50
    $request = put(route('tarefa.update', $tarefa), ['tarefa' => str_repeat('*', 51)]);

    $request->assertSessionHasErrors([
        'tarefa' => __('validation.max.string', ['attribute' => 'tarefa', 'max' => 50]),
    ]);

});

todo('Validar se o frontend está retornando a tarefa correta para editar');
