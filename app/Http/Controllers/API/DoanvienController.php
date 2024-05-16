<?php

namespace App\Http\Controllers\API;

use App\Models\Doanvien;
use App\Models\Giu;
use App\Models\Doanphi;
use App\Models\Sodoan;
use App\Models\Sinhhoat;
use App\Models\Chidoan;
use App\Models\Chucvu;
use \Illuminate\Http\Response;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\API\BaseController as BaseController;



class DoanvienController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Auth::user()->cannot('viewAny', Doanvien::class)) {
            return $this->sendResponse(null, 'Khong du quyen!');
        }
        $doanvien = Doanvien::all();
        return $this->sendResponse($doanvien, 'Lay danh sach doan vien thanh cong!');

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

        //validation
        $validator = Validator::make($input, [
            'MaDV' => 'required',
            'HoDV' => 'required',
            'TenDV' => 'required',
            'GioiTinh' => 'required',
            'NgaySinh' => 'required',
            'Email' => 'required|email',
            'SDT' => 'required',
            'QueQuan' => 'required',
            'MaCD' => 'required',
            'NgayVaoDoan' => 'required',
            'MaChucVu' => 'required',
        ]);

        $response = new \stdClass;

        if ($validator->fails()) {
            $response->message = "Thêm đoàn viên thất bại, vui lòng kiểm tra thông tin";
            $response->error = $validator->errors();
            $response->status = 0;
        } else {
            $input['NgayVaoDoan'] = str_replace('/', '-', $input['NgayVaoDoan']);
            $input['NgaySinh'] = str_replace('/', '-', $input['NgaySinh']);
            $chucvu = ['MaDV' => $input['MaDV'], 'MaChucVu' => $input['MaChucVu']];
            unset($input['MaChucVu']);

            Doanvien::create($input);
            Giu::create($chucvu);

            $response->message = "Thêm đoàn viên thành công";
            $response->status = 1;
        }

        return $this->sendResponse($response, "OK");

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $doanvien = Doanvien::find($id);
        if (is_null($doanvien)) {
            return $this->sendError('Khong tim thay doan vien.');
        }

        if (\Auth::user()->cannot('view', $doanvien)) {
            return $this->sendResponse(null, 'Khong du quyen!');
        }

        return $this->sendResponse(new Response($doanvien), 'Hien thi doan vien thanh cong.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doanvien  $doanvien
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doanvien  $doanvien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doanvien $doanvien)
    {

        $input = $request->all();

        //validation
        $validator = Validator::make($input, [
            'MaDV' => 'required',
            'HoDV' => 'required',
            'TenDV' => 'required',
            'GioiTinh' => 'required',
            'NgaySinh' => 'required',
            'Email' => 'required|email',
            'SDT' => 'required',
            'QueQuan' => 'required',
            'MaCD' => 'required',
            'NgayVaoDoan' => 'required',
            'MaChucVu' => 'required',
        ]);

        $response = new \stdClass;

        if ($validator->fails()) {
            $response->message = "Thêm đoàn viên thất bại, vui lòng kiểm tra thông tin";
            $response->error = $validator->errors();
            $response->status = 0;
        } else {
            $input['NgayVaoDoan'] = \Carbon\Carbon::createFromFormat('d/m/Y', $input['NgayVaoDoan'])->format('Y-m-d');
            $input['NgaySinh'] = \Carbon\Carbon::createFromFormat('d/m/Y', $input['NgaySinh'])->format('Y-m-d');
            $chucvu = ['MaDV' => $input['MaDV'], 'MaChucVu' => $input['MaChucVu']];
            unset($input['MaChucVu']);

            $doanvien = Doanvien::where('MaDV', $input['MaDV']);

            $doanvien->update($input);

            Giu::where('MaDV', $input['MaDV'])->update($chucvu);

            $response->message = "Sửa đoàn viên thành công";
            $response->status = 1;
        }

        return $this->sendResponse($response, "OK");
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
