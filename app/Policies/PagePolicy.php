<?php

namespace App\Policies;

use App\Models\Page;
use App\Models\admin;
use Illuminate\Auth\Access\Response;

class PagePolicy
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
    public function view(admin $admin, Page $page): bool
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
    public function update(admin $admin, Page $page): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(admin $admin, Page $page): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(admin $admin, Page $page): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(admin $admin, Page $page): bool
    {
        //
    }
}
