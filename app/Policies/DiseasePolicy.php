<?php

namespace App\Policies;

use App\Models\Admin\Disease;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DiseasePolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        // if ($user->isSuperAdmin()) {
            return true;
        // }
    }


    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        // return $user->userCanDo('Disease', 'browse');
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin\Disease  $disease
     * @return mixed
     */
    public function view(User $user, Disease $disease)
    {
        // return $user->userCanDo('Disease', 'read');
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        // return $user->userCanDo('Disease', 'add');
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin\Disease  $disease
     * @return mixed
     */
    public function update(User $user, Disease $disease)
    {
        // return $user->userCanDo('Disease', 'edit');
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin\Disease  $disease
     * @return mixed
     */
    public function delete(User $user, Disease $disease)
    {
        // return $user->userCanDo('Disease', 'delete');
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin\Disease  $disease
     * @return mixed
     */
    public function restore(User $user, Disease $disease)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin\Disease  $disease
     * @return mixed
     */
    public function forceDelete(User $user, Disease $disease)
    {
        return true;
    }
}
