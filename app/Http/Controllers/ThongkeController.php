<?php

namespace App\Http\Controllers;


use App\Models\Doanphi;
use App\Models\Chidoan;
use App\Models\Doanvien;

use Illuminate\Http\Request;

class ThongkeController extends Controller
{
    public function view(Request $request)
    {
        if ($request->user()->can('viewAny', Doanphi::class)) {
            $listcd = Chidoan::all();
            $listcdSorted = [];
            foreach ($listcd as $chidoan) {
                if ($request->user()->can('view', $chidoan)) {
                    array_push($listcdSorted, $chidoan);
                }
            }
            return view('thongke', ['listcd' => $listcdSorted]);
        } else {
            return redirect('/');
        }
    }

    // public function viewTable(Request $request)
    // {
    //     $input = $request->all();
    //     $loai = $input['LOAI'];
    //     $maCD = $input['MACD'];
    //     $hocky = $input['HOCKY'];
    //     $tenCD = Chidoan::get()

    // }
}
