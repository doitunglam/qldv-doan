<?php

namespace App\Policies\API;

use App\Models\Doanvien;
use App\Models\User;
use App\Models\Giu;
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
        if ($user->Quyen == 10) {
            return true;
        }

        $doanvien = Doanvien::where('Email', $user->email)->first();

        if ($doanvien) {
            $madv = $doanvien->MaDV;
            $machucvu = Giu::join('chucvu', 'giu.MaChucVu', '=', 'chucvu.MaChucVu')->where('giu.MaDV', $madv)->select('giu.*', 'chucvu.*')->first()->MaChucVu;
            return $machucvu == 2 || $machucvu == 3;
        } else {
            return false;
        }
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
        if ($user->Quyen == 10) {
            return true;
        }

        //
        $madv = Doanvien::where('Email', $user->email)->first()->MaDV;
        $machucvu = Giu::join('chucvu', 'giu.MaChucVu', '=', 'chucvu.MaChucVu')->where('giu.MaDV', $madv)->select('giu.*', 'chucvu.*')->first()->MaChucVu;
        return ($machucvu == 2 || $machucvu == 3) || ($user->email == $doanvien->Email);
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
        $madv = Doanvien::where('Email', $user->email)->first()->MaDV;
        $machucvu = Giu::join('chucvu', 'giu.MaChucVu', '=', 'chucvu.MaChucVu')->where('giu.MaDV', $madv)->select('giu.*', 'chucvu.*')->first()->MaChucVu;
        if ($user->Quyen === 10) {
            return true;
        }
        return $machucvu == 2 || $machucvu == 3;
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
        $madv = Doanvien::where('Email', $user->email)->first()->MaDV;
        $machucvu = Giu::join('chucvu', 'giu.MaChucVu', '=', 'chucvu.MaChucVu')->where('giu.MaDV', $madv)->select('giu.*', 'chucvu.*')->first()->MaChucVu;

        if ($user->Quyen === 10) {
            return true;
        }

        return $machucvu == 2 || $machucvu == 3;
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
        $madv = Doanvien::where('Email', $user->email)->first()->MaDV;
        $machucvu = Giu::join('chucvu', 'giu.MaChucVu', '=', 'chucvu.MaChucVu')->where('giu.MaDV', $madv)->select('giu.*', 'chucvu.*')->first()->MaChucVu;

        if ($user->Quyen === 10) {
            return true;
        }

        return $machucvu == 2 || $machucvu == 3;
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
        $madv = Doanvien::where('Email', $user->email)->first()->MaDV;
        $machucvu = Giu::join('chucvu', 'giu.MaChucVu', '=', 'chucvu.MaChucVu')->where('giu.MaDV', $madv)->select('giu.*', 'chucvu.*')->first()->MaChucVu;

        if ($user->Quyen === 10) {
            return true;
        }

        return $machucvu == 2 || $machucvu == 3;
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
        $madv = Doanvien::where('Email', $user->email)->first()->MaDV;
        $machucvu = Giu::join('chucvu', 'giu.MaChucVu', '=', 'chucvu.MaChucVu')->where('giu.MaDV', $madv)->select('giu.*', 'chucvu.*')->first()->MaChucVu;

        if ($user->Quyen === 10) {
            return true;
        }

        return $machucvu == 2 || $machucvu == 3;
    }
}
