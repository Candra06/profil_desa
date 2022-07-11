<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Dusun;
use Illuminate\Auth\Access\HandlesAuthorization;

class DusunPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the dusun can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list dusuns');
    }

    /**
     * Determine whether the dusun can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Dusun  $model
     * @return mixed
     */
    public function view(User $user, Dusun $model)
    {
        return $user->hasPermissionTo('view dusuns');
    }

    /**
     * Determine whether the dusun can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create dusuns');
    }

    /**
     * Determine whether the dusun can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Dusun  $model
     * @return mixed
     */
    public function update(User $user, Dusun $model)
    {
        return $user->hasPermissionTo('update dusuns');
    }

    /**
     * Determine whether the dusun can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Dusun  $model
     * @return mixed
     */
    public function delete(User $user, Dusun $model)
    {
        return $user->hasPermissionTo('delete dusuns');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Dusun  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete dusuns');
    }

    /**
     * Determine whether the dusun can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Dusun  $model
     * @return mixed
     */
    public function restore(User $user, Dusun $model)
    {
        return false;
    }

    /**
     * Determine whether the dusun can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Dusun  $model
     * @return mixed
     */
    public function forceDelete(User $user, Dusun $model)
    {
        return false;
    }
}
