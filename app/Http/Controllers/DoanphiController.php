<?php

namespace App\Http\Controllers;

use App\Models\Chidoan;
use App\Models\Doanphi;
use App\Models\Doanvien;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Validator;
use App\Http\Resources\Product as ProductResource;

class DoanphiController extends BaseController
{
    // Return doanphi page
    public function view()
    {
        $listCD = Chidoan::all();
        return view('doanphi', ['listcd' => $listCD]);
    }


    // Return chidoan's doanphi list
    public function getData(Request $request)
    {
        // must go to repository pattern, but I'm too tired to do it
        $input = $request->all();
        $validator = Validator::make($input, [
            "MACD" => "required|string"
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $macd = (int) $input['MACD'];

        $data = DB::table('doanvien')
            ->leftJoin('doanphi', 'doanvien.MaDV', '=', 'doanphi.MaDV')
            ->where('MaCD', '=', "$macd")
            ->select('doanphi.*', 'doanvien.MaDV', 'doanvien.HoDV', 'doanvien.TenDV')
            ->get();




        $html = view('tbl-doanphi', ['listDP' => json_encode(json_decode(json_encode($data)))])->render();

        return $this->sendResponse($html, "lamo");
    }

    // Update (or create new Entry) of doan phi
    public function update(Request $request)
    {
        // must go to repository pattern, but I'm too tired to do it

        $input = $request->all();

        $maDV = $input['MaDV'];

        $doanphi = Doanphi::where("MaDV", $maDV)->first();

        if (isset($doanphi)) {
            unset($input['MaDV']);
            foreach ($input as $key => $value) {
                $doanphi[$key] = $value;
            }

            $doanphi->save();
        } else
        {
             $doanphi = Doanphi::create($input);
        }

        return $this->sendResponse($input, "Luu doan phi thanh cong!");
    }


}
