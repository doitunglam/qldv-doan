<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\BaseController;
use App\Models\Chidoan;
use App\Models\Renluyen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;


class RenluyenController extends BaseController
{
    //
    // Return doanphi page
    public function view()
    {
        $listcd = Chidoan::all();
        return view('renluyen', ['listcd' => $listcd]);
    }


    // Return chidoan's doanphi list
    public function getData(Request $request)
    {
        // must go to repository pattern, but I'm too tired to do it
        $input = $request->all();
        $validator = Validator::make($input, [
            "MaCD" => "required|string",
            "HocKy" => "required|string"
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $macd = (int) $input['MaCD'];
        $hocky = $input['HocKy'];

        $renluyen = DB::table('renluyen')->where('HocKy', '=', "HK$hocky");

        $data = DB::table('doanvien')
            ->leftJoinSub($renluyen, 'ren_luyen', function ($join) {
                $join->on('doanvien.MaDV', '=', 'ren_luyen.MaDV');
            })
            ->where("MaCD", "=", "$macd")
            ->select('ren_luyen.*', 'doanvien.MaDV', 'doanvien.HoDV', 'doanvien.TenDV')
            ->get();

        $html = view('tbl-renluyen', ['listRL' => json_encode($data)])->render();

        return $this->sendResponse($html, "OK");
    }

    // Update (or create new Entry) of renluyen
    public function update(Request $request)
    {
        $input = $request->all();

        $maDV = $input['MaDV'];

        $renluyen = Renluyen::where("MaDV", $maDV)->first();

        if (isset($renluyen)) {
            unset($input['MaDV']);
            foreach ($input as $key => $value) {
                $renluyen[$key] = $value;
            }
            $renluyen->save();
        } else {
            $renluyen = Renluyen::create($input);
        }

        return $this->sendResponse($input, "Luu ket qua danh gia thanh cong!");
    }
    public function updateBulk(Request $request)
    {
        $input = $request->all();
        $list_maDV = $input['list_maDV'];
        unset($input['list_maDV']);
        foreach ($list_maDV as $maDV) {
            $renluyen = Renluyen::where("MaDV", $maDV)->first();
            $local_input = $input;
            $local_input["MaDV"] = $maDV;
            unset($local_input['list_maDV']);
            if (isset($renluyen)) {
                foreach ($local_input as $key => $value) {
                    $renluyen[$key] = $value;
                }
                error_log($renluyen);
                $renluyen->save();
            } else {

                $renluyen = Renluyen::create($local_input);
            }

        }
        return $this->sendResponse($input, "Luu ket qua danh gia thanh cong!");
    }

}