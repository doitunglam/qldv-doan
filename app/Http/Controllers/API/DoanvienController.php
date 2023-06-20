<?php

namespace App\Http\Controllers\API;

use App\Models\Doanvien;
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
        //
        $input = $request->all();

        if (\Auth::user()->cannot('create', Doanvien::class)) {
            return $this->sendResponse(null, 'Khong du quyen!');
        }

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
            'NgayVaoDoan' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $product = Doanvien::create($input);

        return $this->sendResponse(new Doanvien($input), 'Tao doan vien thanh cong.');

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
     * @return \Illuminate\Http\Response
     */
    public function edit(Doanvien $doanvien)
    {
        //
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
        //
        $input = $request->all();

        if (\Auth::user()->cannot('update', $doanvien)) {
            return $this->sendResponse(null, 'Khong du quyen!');
        }

        $validator = Validator::make($input, [
            'HoDV' => 'required',
            'TenDV' => 'required',
            'GioiTinh' => 'required',
            'NgaySinh' => 'required',
            'Email' => 'required|email',
            'SDT' => 'required',
            'QueQuan' => 'required',
            'MaCD' => 'required',
            'NgayVaoDoan' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        foreach ($input as $key => $value) {
            $doanvien[$key] = $value;
        }

        $doanvien->save();

        return $this->sendResponse($doanvien, 'Sua doan vien thanh cong.');
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

        if (\Auth::user()->cannot('delete', $doanvien)) {
            return $this->sendResponse(null, 'Khong du quyen!');
        }

        $doanvien->delete();

        return $this->sendResponse([], 'Xoa doan vien thanh cong.');
    }
}
