<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogsPolicy
{
    use HandlesAuthorization;

    public function show(User $user): bool
    {
        return $user->can('show blogs');
    }

    public function create(User $user): bool
    {
        return $user->can('create blogs');
    }

    public function update(User $user): bool
    {
        return $user->can('update blogs');
    }

    public function delete(User $user): bool
    {
        return $user->can('delete blogs');
    }
}
