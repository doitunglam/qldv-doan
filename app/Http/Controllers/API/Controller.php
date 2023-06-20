<?php

namespace App\Http\Controllers\API;

use App\Models\Khoa;
use \Illuminate\Http\Response;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\API\BaseController as BaseController;



class KhoaController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Auth::user()->cannot('viewAny', Khoa::class)) {
            return $this->sendResponse(null, 'Khong du quyen!');
        }
        $Khoa = Khoa::all();
        return $this->sendResponse($Khoa, 'Lay danh sach khoa thanh cong!');

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
        if (\Auth::user()->cannot('create', Khoa::class)) {
            return $this->sendResponse(null, 'Khong du quyen!');
        }
        $input = $request->all();

        $validator = Validator::make($input, [
            'MaKhoa' => 'required',
            'TenKhoa' => 'required',
            'SDT' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $Khoa = Khoa::create($input);

        return $this->sendResponse($Khoa, 'Tao khoa thanh cong.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Khoa = Khoa::find($id);
        if (is_null($Khoa)) {
            return $this->sendError('Khong tim thay khoa.');
        }

        if (\Auth::user()->cannot('view', $Khoa)) {
            return $this->sendResponse(null, 'Khong du quyen!');
        }

        return $this->sendResponse(new Response($Khoa), 'Hien thi khoa thanh cong.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Khoa  $Khoa
     * @return \Illuminate\Http\Response
     */
    public function edit(Khoa $Khoa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Khoa  $Khoa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Khoa $Khoa)
    {
        //
        $input = $request->all();

        if (\Auth::user()->cannot('update', $Khoa)) {
            return $this->sendResponse(null, 'Khong du quyen!');
        }

        $validator = Validator::make($input, [
            'TenKhoa' => 'required',
            'SDT' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        foreach ($input as $key => $value) {
            $Khoa[$key] = $value;
        }

        $Khoa->save();

        return $this->sendResponse($Khoa, 'Sua khoa thanh cong.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Khoa  $Khoa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Khoa $Khoa)
    {
        //

        if (\Auth::user()->cannot('delete', $Khoa)) {
            return $this->sendResponse(null, 'Khong du quyen!');
        }

        $Khoa->delete();

        return $this->sendResponse([], 'Xoa khoa thanh cong.');
    }
}
