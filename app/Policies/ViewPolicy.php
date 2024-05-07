<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Doanvien;
use Illuminate\Auth\Access\HandlesAuthorization;

class ViewPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function viewChidoan(User $user, Post $post): bool
    {
        return $user->id === $post->user_id;
    }
}
