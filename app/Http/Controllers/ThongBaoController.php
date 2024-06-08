<?php

namespace App\Http\Controllers;

use App\Models\ThongBao;
use App\Models\Doanvien;
use Illuminate\Http\Request;

class ThongBaoController extends Controller
{
    public function view(Request $request)
    {
        $user = $request->user();
        $doanvien = Doanvien::where('Email', $user->email)->first();
        $madv = $doanvien->MaDV;

        $makhoa = substr($madv, 0, 2);

        $thongbao = ThongBao::leftJoin('doanvien', 'doanvien.MaDV', '=', 'thongbao.MaDV')->
            where('Khoa', 'LIKE', $makhoa . '%')->
            orderBy('created_at', 'desc')->
            get();
        return view('thongbao', ['listTB' => $thongbao]);
    }
}
