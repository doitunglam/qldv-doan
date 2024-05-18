<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\BaseController;
use App\Models\Chidoan;
use App\Models\Doanvien;
use App\Models\Renluyen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;


class RenluyenController extends BaseController
{
    //
    public function view(Request $request)
    {
        if ($request->user()->can('viewAny', Renluyen::class)) {
            $listcd = Chidoan::all();
            $listcdSorted = [];
            foreach ($listcd as $chidoan) {
                if ($request->user()->can('view', $chidoan)) {
                    array_push($listcdSorted, $chidoan);
                }
            }

            return view('renluyen', ['listcd' => $listcdSorted]);
        } else {
            $renluyen = Renluyen::where('MaDV', '=', Doanvien::where('Email', $request->user()->email)->first()->MaDV)->get();

            return view('renluyen-single', ['listrl' => $renluyen]);

        }
    }
}
