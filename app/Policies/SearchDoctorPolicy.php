<?php

namespace App\Policies;

use App\Models\SearchDoctor;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SearchDoctorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        if ($user->type == 'Admin' || $user->type == 'admin') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SearchDoctor  $searchDoctor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, SearchDoctor $searchDoctor)
    {
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SearchDoctor  $searchDoctor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, SearchDoctor $searchDoctor)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SearchDoctor  $searchDoctor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, SearchDoctor $searchDoctor)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SearchDoctor  $searchDoctor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, SearchDoctor $searchDoctor)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SearchDoctor  $searchDoctor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, SearchDoctor $searchDoctor)
    {
        //
    }
}
