<?php

namespace App\Policies\API;

use App\Models\User;
use App\Models\Doanvien;
use App\Models\Giu;
use Illuminate\Auth\Access\HandlesAuthorization;

class RenluyenPolicy
{
    use HandlesAuthorization;
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
        return $machucvu > 1;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Renluyen  $renluyen
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Renluyen $renluyen)
    {
        //
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
     * @param  \App\Models\Renluyen  $renluyen
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Renluyen $renluyen)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Renluyen  $renluyen
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Renluyen $renluyen)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Renluyen  $renluyen
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Renluyen $renluyen)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Renluyen  $renluyen
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Renluyen $renluyen)
    {
        //
    }
}
