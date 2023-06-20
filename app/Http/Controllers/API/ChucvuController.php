<?php

namespace App\Http\Controllers\API;

use App\Models\Chucvu;
use \Illuminate\Http\Response;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\API\BaseController as BaseController;



class ChucvuController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Auth::user()->cannot('viewAny', Chucvu::class)) {
            return $this->sendResponse(null, 'Khong du quyen!');
        }
        $chucvu = Chucvu::all();
        return $this->sendResponse($chucvu, 'Lay danh sach chuc vu thanh cong!');

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
        if (\Auth::user()->cannot('create', Chucvu::class)) {
            return $this->sendResponse(null, 'Khong du quyen!');
        }
        $input = $request->all();

        $validator = Validator::make($input, [
            'MaChucVu' => 'required',
            'TenChucVu' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $chucvu = Chucvu::create($input);

        return $this->sendResponse(new $chucvu, 'Tao chuc vu thanh cong.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chucvu = Chucvu::find($id);
        if (is_null($chucvu)) {
            return $this->sendError('Khong tim thay chuc vu.');
        }

        if (\Auth::user()->cannot('view', $chucvu)) {
            return $this->sendResponse(null, 'Khong du quyen!');
        }

        return $this->sendResponse(new Response($chucvu), 'Hien thi chuc vu thanh cong.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chucvu  $chucvu
     * @return \Illuminate\Http\Response
     */
    public function edit(Chucvu $chucvu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chucvu  $chucvu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chucvu $chucvu)
    {
        //
        $input = $request->all();

        if (\Auth::user()->cannot('update', $chucvu)) {
            return $this->sendResponse(null, 'Khong du quyen!');
        }

        $validator = Validator::make($input, [
            'TenChucVu' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        foreach ($input as $key => $value) {
            $chucvu[$key] = $value;
        }

        $chucvu->save();

        return $this->sendResponse($chucvu, 'Sua chuc vu thanh cong.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chucvu  $chucvu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chucvu $chucvu)
    {
        //

        if (\Auth::user()->cannot('delete', $chucvu)) {
            return $this->sendResponse(null, 'Khong du quyen!');
        }

        $chucvu->delete();

        return $this->sendResponse([], 'Xoa chuc vu thanh cong.');
    }
}
