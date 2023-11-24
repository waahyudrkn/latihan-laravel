<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Siswa;
use Illuminate\Auth\Access\Response;

class SiswaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
//     public function before(User $user, string $ability): bool|null
// {
//     if ($user->hasRole('Super Admin')) {
//         return true;
//     }
 
//     return null; // see the note above in Gate::before about why null must be returned here.
// }
    public function viewAny(User $user): bool
    {
        return true; // Admins and teachers can view
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {
        return true;
    
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        // if ($user->can('tambah-siswa')) {
        //     return true;
        // };
        
        if ($user->hasrole('admin')) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user)
    {

        if ($user->hasrole('admin')) {
            return true;
        }

        // if ($user->can('edit-siswa')) {
        //     return true;
        // }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user)
    {
        // if ($user->role('admin')) {
        //     return true;
        // }

        // if ($user->can('hapus-siswa')) {
        //     return true;
        // }

        if ($user->hasrole('admin')) {
            return true;
        }

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Siswa $siswa): bool
    {

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Siswa $siswa): bool
    {

    }
}
