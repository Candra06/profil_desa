<?php

namespace App\Policies;

use App\Models\User;
use App\Models\VillagePottentions;
use Illuminate\Auth\Access\HandlesAuthorization;

class VillagePottentionsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the villagePottentions can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list allvillagepottentions');
    }

    /**
     * Determine whether the villagePottentions can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\VillagePottentions  $model
     * @return mixed
     */
    public function view(User $user, VillagePottentions $model)
    {
        return $user->hasPermissionTo('view allvillagepottentions');
    }

    /**
     * Determine whether the villagePottentions can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create allvillagepottentions');
    }

    /**
     * Determine whether the villagePottentions can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\VillagePottentions  $model
     * @return mixed
     */
    public function update(User $user, VillagePottentions $model)
    {
        return $user->hasPermissionTo('update allvillagepottentions');
    }

    /**
     * Determine whether the villagePottentions can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\VillagePottentions  $model
     * @return mixed
     */
    public function delete(User $user, VillagePottentions $model)
    {
        return $user->hasPermissionTo('delete allvillagepottentions');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\VillagePottentions  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete allvillagepottentions');
    }

    /**
     * Determine whether the villagePottentions can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\VillagePottentions  $model
     * @return mixed
     */
    public function restore(User $user, VillagePottentions $model)
    {
        return false;
    }

    /**
     * Determine whether the villagePottentions can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\VillagePottentions  $model
     * @return mixed
     */
    public function forceDelete(User $user, VillagePottentions $model)
    {
        return false;
    }
}
