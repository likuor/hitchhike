<?php

namespace App\Policies;

use App\Spot;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SpotPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any spots.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(?User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the spot.
     *
     * @param  \App\User  $user
     * @param  \App\Spot  $spot
     * @return mixed
     */
    public function view(?User $user, Spot $spot)
    {
        return true;
    }

    /**
     * Determine whether the user can create spots.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the spot.
     *
     * @param  \App\User  $user
     * @param  \App\Spot  $spot
     * @return mixed
     */
    public function update(User $user, Spot $spot)
    {
        return $user->id === $spot->user_id;
    }

    /**
     * Determine whether the user can delete the spot.
     *
     * @param  \App\User  $user
     * @param  \App\Spot  $spot
     * @return mixed
     */
    public function delete(User $user, Spot $spot)
    {
        return $user->id === $spot->user_id;
    }

    /**
     * Determine whether the user can restore the spot.
     *
     * @param  \App\User  $user
     * @param  \App\Spot  $spot
     * @return mixed
     */
    public function restore(User $user, Spot $spot)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the spot.
     *
     * @param  \App\User  $user
     * @param  \App\Spot  $spot
     * @return mixed
     */
    public function forceDelete(User $user, Spot $spot)
    {
        //
    }
}
