<?php

namespace App\Http\Controllers\API;

use App\Models\Doanvien;
use App\Models\Giu;
use App\Models\Doanphi;
use App\Models\Renluyen;
use App\Models\Sodoan;
use App\Models\Sinhhoat;
use App\Models\Chidoan;
use App\Models\Chucvu;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\API\BaseController as BaseController;



class RenluyenController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
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

        $renluyen = \DB::table('renluyen')->where('HocKy', '=', "HK$hocky");

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $maDV = $input['MaDV'];
        $hocKy = $input['HocKy'];

        $renluyen = Renluyen::where("MaDV", $maDV)->where("HocKy", $hocKy)->first();

        if (isset($renluyen)) {
            return $this->sendError(null, null, 201);
        }

        $renluyen = Renluyen::create($input);

        return $this->sendResponse($input, "Luu ket qua danh gia thanh cong!");
    }

    /**
     * Display the specified resource.
     *
     * @param int $maCD
     * @param int $hocKy
     * @return \Illuminate\Http\Response
     */
    public function show($maCD, $hocKy)
    {
        $renluyen = DB::table('renluyen')->where('HocKy', '=', "HK$hocKy");

        $data = DB::table('doanvien')
            ->leftJoinSub($renluyen, 'ren_luyen', function ($join) {
                $join->on('doanvien.MaDV', '=', 'ren_luyen.MaDV');
            })
            ->where("MaCD", "=", "$maCD")
            ->select('ren_luyen.*', 'doanvien.MaDV', 'doanvien.HoDV', 'doanvien.TenDV')
            ->get();

        return $this->sendResponse($data, "OK");
    }

    /**
     * Display the specified resource.
     *
     * @param int $maCD
     * @param int $hocKy
     * @return \Illuminate\Http\Response
     */
    public function showView($maCD, $hocKy)
    {
        $renluyen = DB::table('renluyen')->where('HocKy', '=', "HK$hocKy");

        $data = DB::table('doanvien')
            ->leftJoinSub($renluyen, 'ren_luyen', function ($join) {
                $join->on('doanvien.MaDV', '=', 'ren_luyen.MaDV');
            })
            ->where("MaCD", "=", "$maCD")
            ->select('ren_luyen.*', 'doanvien.MaDV', 'doanvien.HoDV', 'doanvien.TenDV')
            ->get();

        $html = view('tbl-renluyen', ['listRL' => json_encode($data)])->render();

        return $this->sendResponse($html, "OK");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int  $maDV
     * @param string  $hocKy
     * @return \Illuminate\Http\Response | \Illuminate\Contracts\View\View
     */
    public function edit(Doanvien $doanvien)
    {
        //
        $maDV = $doanvien->MaDV;
        $listCD = Chidoan::all();
        $listCV = Chucvu::all();


        $doanvien = Doanvien::where("doanvien.MaDV", "=", $maDV)->
            leftJoin('giu', 'doanvien.MaDV', '=', 'giu.MaDV')->
            select('doanvien.*', 'MaCD', 'MaChucVu')->
            first();

        if (isset($doanvien)) {
            return view('doanvien-sua', ['listcd' => $listCD, 'listcv' => $listCV, 'doanvien' => json_decode(json_encode($doanvien), true)]);
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $input = $request->all();
        $maDV = $input['MaDV'];
        $hocKy = $input['HocKy'];

        $renluyen = Renluyen::where("MaDV", $maDV)->where("HocKy", $hocKy)->first();

        foreach ($input as $key => $value) {
            $renluyen[$key] = $value;
        }
        $renluyen->save();

        return $this->sendResponse($input, "Luu ket qua danh gia thanh cong!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doanvien  $doanvien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doanvien $doanvien)
    {
        //
        $response = new \stdClass;

        $maDV = $doanvien->MaDV;

        Giu::where('MaDV', $maDV)->delete();

        Doanphi::where('MaDV', $maDV)->delete();
        Sodoan::where('MaDV', $maDV)->delete();
        Sinhhoat::where('MaDV', $maDV)->delete();

        $doanvien->delete();

        $response->message = "Xóa đoàn viên thành công";
        $response->status = 1;

        return $this->sendResponse($response, "OK");
    }
}
