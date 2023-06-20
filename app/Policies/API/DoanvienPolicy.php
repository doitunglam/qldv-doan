<?php

namespace App\Policies\API;

use App\Models\Doanvien;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DoanvienPolicy
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
        // is admin or not
        return $user->Quyen === 1;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Doanvien  $doanvien
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Doanvien $doanvien)
    {
        //
        return $user->Quyen === 1 || $user->email === $doanvien->Email;

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
        return $user->Quyen === 1;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Doanvien  $doanvien
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Doanvien $doanvien)
    {
        //
        return $user->Quyen === 1 || $user->email === $doanvien->Email;

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Doanvien  $doanvien
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Doanvien $doanvien)
    {
        //
        return $user->Quyen === 1 ;

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Doanvien  $doanvien
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Doanvien $doanvien)
    {
        //
        return $user->Quyen === 1 ;

    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Doanvien  $doanvien
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Doanvien $doanvien)
    {
        //
        return $user->Quyen === 1 ;

    }
}
