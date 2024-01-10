<?php

use App\Models\Tarefa;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\delete;

test('exlcuir a tarefa', function() {

    $userRight = User::factory()->create();
    $userWronge = User::factory()->create();

    $tarefa = Tarefa::factory()->for($userRight)->create();

    actingAs($userWronge);

    delete(route('tarefa.delete', $tarefa))
        ->assertForbidden();

    actingAs($userRight);

    delete(route('tarefa.delete', $tarefa))
        ->assertRedirect(route('dashboard'));
    
    assertDatabaseMissing('tarefas',['tarefa' => $tarefa->tarefa]);

    assertDatabaseCount('tarefas', 0);

});