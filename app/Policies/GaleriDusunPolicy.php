<?php

namespace App\Policies;

use App\Models\User;
use App\Models\GaleriDusun;
use Illuminate\Auth\Access\HandlesAuthorization;

class GaleriDusunPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the galeriDusun can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list galeridusuns');
    }

    /**
     * Determine whether the galeriDusun can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\GaleriDusun  $model
     * @return mixed
     */
    public function view(User $user, GaleriDusun $model)
    {
        return $user->hasPermissionTo('view galeridusuns');
    }

    /**
     * Determine whether the galeriDusun can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create galeridusuns');
    }

    /**
     * Determine whether the galeriDusun can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\GaleriDusun  $model
     * @return mixed
     */
    public function update(User $user, GaleriDusun $model)
    {
        return $user->hasPermissionTo('update galeridusuns');
    }

    /**
     * Determine whether the galeriDusun can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\GaleriDusun  $model
     * @return mixed
     */
    public function delete(User $user, GaleriDusun $model)
    {
        return $user->hasPermissionTo('delete galeridusuns');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\GaleriDusun  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete galeridusuns');
    }

    /**
     * Determine whether the galeriDusun can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\GaleriDusun  $model
     * @return mixed
     */
    public function restore(User $user, GaleriDusun $model)
    {
        return false;
    }

    /**
     * Determine whether the galeriDusun can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\GaleriDusun  $model
     * @return mixed
     */
    public function forceDelete(User $user, GaleriDusun $model)
    {
        return false;
    }
}
