<?php

namespace App\Policies\API;

use App\Models\Chidoan;
use App\Models\Doanvien;
use App\Models\Giu;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChidoanPolicy
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
        return $user->Quyen === 10;

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Chidoan  $chidoan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Chidoan $chidoan)
    {
        //
        $doanvien = Doanvien::where('Email', $user->email)->first();
        $madv = $doanvien->MaDV;
        $machucvu = Giu::join('chucvu', 'giu.MaChucVu', '=', 'chucvu.MaChucVu')->where('giu.MaDV', $madv)->select('giu.*', 'chucvu.*')->first()->MaChucVu;

        if ($user->Quyen === 10) {
            return true;
        }

        if (($chidoan->MaCD == $doanvien->MaCD) && ($machucvu == 2 || $machucvu == 3))
            return true;
        return false;
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
        return $user->Quyen === 10;

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Chidoan  $chidoan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Chidoan $chidoan)
    {
        //
        return $user->Quyen === 10;

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Chidoan  $chidoan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Chidoan $chidoan)
    {
        //
        return $user->Quyen === 10;

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Chidoan  $chidoan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Chidoan $chidoan)
    {
        //
        return $user->Quyen === 10;

    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Chidoan  $chidoan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Chidoan $chidoan)
    {
        //
        return $user->Quyen === 10;

    }
}
