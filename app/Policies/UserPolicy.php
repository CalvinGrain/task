<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function show(User $user): bool
    {
        return $user->can('show users');
    }

    public function create(User $user): bool
    {
        return $user->can('create users');
    }

    public function update(User $user): bool
    {
        return $user->can('update users');
    }

    public function delete(User $user): bool
    {
        return $user->can('delete users');
    }
}
