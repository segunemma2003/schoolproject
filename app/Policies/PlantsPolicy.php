<?php

namespace App\Policies;

use App\Models\Admin\Plants;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PlantsPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->isSuperAdmin()) {
            return true;
        }
    }


    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->userCanDo('Plants', 'browse');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin\Plants  $plants
     * @return mixed
     */
    public function view(User $user, Plants $plants)
    {
        return $user->userCanDo('Plants', 'read');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->userCanDo('Plants', 'add');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin\Plants  $plants
     * @return mixed
     */
    public function update(User $user, Plants $plants)
    {
        return $user->userCanDo('Plants', 'edit');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin\Plants  $plants
     * @return mixed
     */
    public function delete(User $user, Plants $plants)
    {
        return $user->userCanDo('Plants', 'delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin\Plants  $plants
     * @return mixed
     */
    public function restore(User $user, Plants $plants)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin\Plants  $plants
     * @return mixed
     */
    public function forceDelete(User $user, Plants $plants)
    {
        return true;
    }
}
