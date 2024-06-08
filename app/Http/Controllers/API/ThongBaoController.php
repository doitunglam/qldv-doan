<?php

namespace App\Http\Controllers\API;

use App\Models\ThongBao;
use App\Models\Doanvien;
use Illuminate\Http\Request;

class ThongBaoController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $user = $request->user();
        $doanvien = Doanvien::where('Email', $user->email)->first();
        $madv = $doanvien->MaDV;

        $input['MaDV'] = $madv;

        ThongBao::create($input);

        $response = new \stdClass;
        $response->message = "Tạo thông báo thành công";
        $response->status = 1;

        return $this->sendResponse($response, 'OK');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ThongBao  $thongBao
     * @return \Illuminate\Http\Response
     */
    public function show(ThongBao $thongBao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ThongBao  $thongBao
     * @return \Illuminate\Http\Response
     */
    public function edit(ThongBao $thongBao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ThongBao  $thongBao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ThongBao $thongBao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ThongBao  $thongBao
     * @return \Illuminate\Http\Response
     */
    public function destroy(ThongBao $thongBao)
    {
        //
    }
}
