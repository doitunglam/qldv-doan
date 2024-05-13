<?php

namespace App\Policies\API;

use App\Models\Doanphi;
use App\Models\Doanvien;
use App\Models\Giu;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DoanphiPolicy
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
        //
        $madv = Doanvien::where('Email', $user->email)->first()->MaDV;
        $machucvu = Giu::join('chucvu', 'giu.MaChucVu', '=', 'chucvu.MaChucVu')->where('giu.MaDV', $madv)->select('giu.*', 'chucvu.*')->first()->MaChucVu;
        return $machucvu == 2 || $machucvu == 3;

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Doanphi  $doanphi
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Doanphi $doanphi)
    {
        //
        return $user->Quyen === 1;

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
     * @param  \App\Models\Doanphi  $doanphi
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Doanphi $doanphi)
    {
        //
        return $user->Quyen === 1;

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Doanphi  $doanphi
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Doanphi $doanphi)
    {
        //
        return $user->Quyen === 1;

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Doanphi  $doanphi
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Doanphi $doanphi)
    {
        //
        return $user->Quyen === 1;

    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Doanphi  $doanphi
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Doanphi $doanphi)
    {
        //
        return $user->Quyen === 1;

    }
}
