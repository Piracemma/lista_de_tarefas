<?php

use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\post;

test('validar redirecionamento da rota', function () {

    $user = User::factory()->create();
    actingAs($user);

    $request = post(route('tarefa.create'), ['tarefa' => 'a fazer']);

    $request->assertRedirect(route('tarefa.index'));

});

test('validar entrada dos dados', function () {

    $user = User::factory()->create();
    actingAs($user);

    //required
    $request = post(route('tarefa.create'), ['tarefa' => '']);

    $request->assertSessionHasErrors([
        'tarefa' => __('validation.required', ['attribute' => 'tarefa']),
    ]);

    //string
    $request = post(route('tarefa.create'), ['tarefa' => 1321]);

    $request->assertSessionHasErrors([
        'tarefa' => __('validation.string', ['attribute' => 'tarefa']),
    ]);

    //min:5
    $request = post(route('tarefa.create'), ['tarefa' => '123']);

    $request->assertSessionHasErrors([
        'tarefa' => __('validation.min.string', ['attribute' => 'tarefa', 'min' => 5]),
    ]);

    //max:50
    $request = post(route('tarefa.create'), ['tarefa' => str_repeat('*', 51)]);

    $request->assertSessionHasErrors([
        'tarefa' => __('validation.max.string', ['attribute' => 'tarefa', 'max' => 50]),
    ]);

});

test('validar inclusao no banco', function () {

    $user = User::factory()->create();
    actingAs($user);

    post(route('tarefa.create'), ['tarefa' => 'Limpar o quarto'])->assertRedirect(route('tarefa.index'));

    assertDatabaseCount('tarefas', 1);
    assertDatabaseHas('tarefas', ['tarefa' => 'Limpar o quarto']);

});

test('somente usuarios logados podem criar tarefas', function () {

    post(route('tarefa.create'), ['tarefa' => 'Limpar o quarto'])->assertRedirect(route('login'));

});
