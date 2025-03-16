<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\admin;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(admin $admin): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(admin $admin, Post $post): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(admin $admin): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(admin $admin, Post $post): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(admin $admin, Post $post): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(admin $admin, Post $post): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(admin $admin, Post $post): bool
    {
        //
    }
}
