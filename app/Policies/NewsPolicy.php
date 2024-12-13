<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NewsPolicy
{
    use HandlesAuthorization;

    public function show(User $user): bool
    {
        return $user->can('show news');
    }

    public function create(User $user): bool
    {
        return $user->can('create news');
    }

    public function update(User $user): bool
    {
        return $user->can('update news');
    }

    public function delete(User $user): bool
    {
        return $user->can('delete news');
    }
}
