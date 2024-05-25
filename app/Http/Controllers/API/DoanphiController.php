<?php

namespace App\Http\Controllers\API;

use App\Models\Doanphi;
use \Illuminate\Http\Response;
use Illuminate\Http\Request;
use Validator;
use DB;
use App\Http\Controllers\API\BaseController as BaseController;



class DoanphiController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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

        // ĐÚng thì data ở đây
        return $this->sendResponse($data, "Hien doan phi thanh cong!");


        // $html = view('tbl-doanphi', ['listDP' => json_encode(json_decode(json_encode($data)))])->render();

        // return $this->sendResponse($html, "OK");
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

        $doanphi = Doanphi::where("MaDV", $maDV)->first();

        if (isset($doanphi)) {
            unset($input['MaDV']);
            foreach ($input as $key => $value) {
                $doanphi[$key] = $value;
            }

            $doanphi->save();
        } else {
            $doanphi = Doanphi::create($input);
        }

        return $this->sendResponse($input, "Luu doan phi thanh cong!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($maCD)
    {
        $data = DB::table('doanvien')
            ->leftJoin('doanphi', 'doanvien.MaDV', '=', 'doanphi.MaDV')
            ->where('MaCD', '=', "$maCD")
            ->select('doanphi.*', 'doanvien.MaDV', 'doanvien.HoDV', 'doanvien.TenDV')
            ->get();

        return $this->sendResponse($data, "Hien doan phi thanh cong!");
    }

        /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function showView($maCD)
    {
        $data = DB::table('doanvien')
            ->leftJoin('doanphi', 'doanvien.MaDV', '=', 'doanphi.MaDV')
            ->where('MaCD', '=', "$maCD")
            ->select('doanphi.*', 'doanvien.MaDV', 'doanvien.HoDV', 'doanvien.TenDV')
            ->get();

        $html = view('tbl-doanphi', ['listDP' => json_encode(json_decode(json_encode($data)))])->render();

        return $this->sendResponse($html, "OK");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doanphi  $doanphi
     * @return \Illuminate\Http\Response
     */
    public function edit(Doanphi $doanphi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doanphi  $doanphi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doanphi $doanphi)
    {
        //
        $input = $request->all();

        if (\Auth::user()->cannot('update', $doanphi)) {
            return $this->sendResponse(null, 'Khong du quyen!');
        }

        $validator = Validator::make($input, [
            'HK1' => 'optional|numeric',
            'HK2' => 'optional|numeric',
            'HK3' => 'optional|numeric',
            'HK4' => 'optional|numeric',
            'HK5' => 'optional|numeric',
            'HK6' => 'optional|numeric',
            'HK7' => 'optional|numeric',
            'HK8' => 'optional|numeric'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        foreach ($input as $key => $value) {
            $doanphi[$key] = $value;
        }

        $doanphi->save();

        return $this->sendResponse($doanphi, 'Sua doan phi thanh cong.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doanphi  $doanphi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doanphi $doanphi)
    {
        //

        if (\Auth::user()->cannot('delete', $doanphi)) {
            return $this->sendResponse(null, 'Khong du quyen!');
        }

        $doanphi->delete();

        return $this->sendResponse([], 'Xoa doan phi thanh cong.');
    }
}
