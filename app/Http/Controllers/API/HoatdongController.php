<?php

namespace App\Http\Controllers\API;

use App\Models\Hoatdong;
use \Illuminate\Http\Response;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\API\BaseController as BaseController;



class HoatdongController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Auth::user()->cannot('viewAny', Hoatdong::class)) {
            return $this->sendResponse(null, 'Khong du quyen!');
        }
        $Hoatdong = Hoatdong::all();
        return $this->sendResponse($Hoatdong, 'Lay danh sach hoat dong thanh cong!');

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
        if (\Auth::user()->cannot('create', Hoatdong::class)) {
            return $this->sendResponse(null, 'Khong du quyen!');
        }
        $input = $request->all();

        $validator = Validator::make($input, [
            'MaHD' => 'required',
            'TenHD' => 'required'

        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $Hoatdong = Hoatdong::create($input);

        return $this->sendResponse($Hoatdong, 'Tao hoat dong thanh cong.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Hoatdong = Hoatdong::find($id);
        if (is_null($Hoatdong)) {
            return $this->sendError('Khong tim thay hoat dong.');
        }

        if (\Auth::user()->cannot('view', $Hoatdong)) {
            return $this->sendResponse(null, 'Khong du quyen!');
        }

        return $this->sendResponse(new Response($Hoatdong), 'Hien thi hoat dong thanh cong.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hoatdong  $Hoatdong
     * @return \Illuminate\Http\Response
     */
    public function edit(Hoatdong $Hoatdong)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hoatdong  $Hoatdong
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hoatdong $Hoatdong)
    {
        //
        $input = $request->all();

        if (\Auth::user()->cannot('update', $Hoatdong)) {
            return $this->sendResponse(null, 'Khong du quyen!');
        }

        $validator = Validator::make($input, [
            'TenHD' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        foreach ($input as $key => $value) {
            $Hoatdong[$key] = $value;
        }

        $Hoatdong->save();

        return $this->sendResponse($Hoatdong, 'Sua hoat dong thanh cong.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hoatdong  $Hoatdong
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hoatdong $Hoatdong)
    {
        //

        if (\Auth::user()->cannot('delete', $Hoatdong)) {
            return $this->sendResponse(null, 'Khong du quyen!');
        }

        $Hoatdong->delete();

        return $this->sendResponse([], 'Xoa hoat dong thanh cong.');
    }
}
