<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function edit(User $user, Post $post)
    {
        return $user->ownPost($post);
    }

    public function delete(User $user, Post $post)
    {
        return $user->ownPost($post);
    }
}
