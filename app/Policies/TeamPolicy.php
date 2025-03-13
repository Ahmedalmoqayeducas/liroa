<?php

namespace App\Policies;

use App\Models\Team;
use App\Models\admin;
use Illuminate\Auth\Access\Response;

class TeamPolicy
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
    public function view(admin $admin, Team $team): bool
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
    public function update(admin $admin, Team $team): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(admin $admin, Team $team): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(admin $admin, Team $team): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(admin $admin, Team $team): bool
    {
        //
    }
}
