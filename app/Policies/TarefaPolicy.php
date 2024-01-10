<?php

namespace App\Policies;

use App\Models\Tarefa;
use App\Models\User;

class TarefaPolicy
{
    public function update(User $user, Tarefa $tarefa): bool
    {
        return $tarefa->user->is($user);
    }

    public function edit(User $user, Tarefa $tarefa): bool
    {
        return $tarefa->user->is($user);
    }

    public function check(User $user, Tarefa $tarefa): bool
    {
        return $tarefa->user->is($user);
    }
}
