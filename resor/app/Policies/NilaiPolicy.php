<?php

namespace App\Policies;

use App\Models\Nilai;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class NilaiPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Nilai $nilai): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        // if ($user->can('tambah-nilai')) {
        //     return true;
        // };

        if ($user->hasrole('guru|admin')) {
            return true;
        }

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user)
    {
        if ($user->can('edit-nilai')) {
            return true;
        };
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user)
    {
        if ($user->can('hapus-nilai')) {
            return true;
        };
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Nilai $nilai): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Nilai $nilai): bool
    {
        //
    }
}
