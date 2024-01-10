<?php

use App\Models\Tarefa;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\patch;
use function Pest\Laravel\post;

test('marcar tarefa como concluida', function() {

    $userRight = User::factory()->create();
    $userWronge = User::factory()->create();

    $tarefa = Tarefa::factory()->for($userRight)->create();

    actingAs($userWronge);

    patch(route('tarefa.check', $tarefa))
        ->assertForbidden();

    actingAs($userRight);

    patch(route('tarefa.check', $tarefa))
        ->assertRedirect(route('dashboard'));

    expect($tarefa->refresh()->status)->toBe(1);

    assertDatabaseHas('tarefas', ['status' => 1]);


});