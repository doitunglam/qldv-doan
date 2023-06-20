<?php

namespace App\Http\Controllers\API;

use App\Models\Chidoan;
use \Illuminate\Http\Response;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\API\BaseController as BaseController;



class ChidoanController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Auth::user()->cannot('viewAny', Chidoan::class)) {
            return $this->sendResponse(null, 'Khong du quyen!');
        }
        $chidoan = Chidoan::all();
        return $this->sendResponse($chidoan, 'Lay danh sach chi doan thanh cong!');

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
        if (\Auth::user()->cannot('create', Chidoan::class)) {
            return $this->sendResponse(null, 'Khong du quyen!');
        }
        $input = $request->all();

        $validator = Validator::make($input, [
            'MaCD' => 'required',
            'TenCD' => 'required',
            'DiaChi' => 'required',
            'SDT' => 'required',
            'MaKhoa' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $chidoan = Chidoan::create($input);

        return $this->sendResponse(new Chidoan($input), 'Tao chi doan thanh cong.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chidoan = Chidoan::find($id);
        if (is_null($chidoan)) {
            return $this->sendError('Khong tim thay chi doan.');
        }

        if (\Auth::user()->cannot('view', $chidoan)) {
            return $this->sendResponse(null, 'Khong du quyen!');
        }

        return $this->sendResponse(new Response($chidoan), 'Hien thi chi doan thanh cong.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chidoan  $chidoan
     * @return \Illuminate\Http\Response
     */
    public function edit(chidoan $chidoan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chidoan  $chidoan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chidoan $chidoan)
    {
        //
        $input = $request->all();

        if (\Auth::user()->cannot('update', $chidoan)) {
            return $this->sendResponse(null, 'Khong du quyen!');
        }

        $validator = Validator::make($input, [
            'TenCD' => 'required',
            'DiaChi' => 'required',
            'SDT' => 'required',
            'MaKhoa' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        foreach ($input as $key => $value) {
            $chidoan[$key] = $value;
        }

        $chidoan->save();

        return $this->sendResponse($chidoan, 'Sua chi doan thanh cong.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chidoan  $chidoan
     * @return \Illuminate\Http\Response
     */
    public function destroy(chidoan $chidoan)
    {
        //

        if (\Auth::user()->cannot('delete', $chidoan)) {
            return $this->sendResponse(null, 'Khong du quyen!');
        }

        $chidoan->delete();

        return $this->sendResponse([], 'Xoa chi doan thanh cong.');
    }
}
