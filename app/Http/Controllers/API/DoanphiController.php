<?php

namespace App\Http\Controllers\API;

use App\Models\Doanphi;
use \Illuminate\Http\Response;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\API\BaseController as BaseController;



class DoanphiController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Auth::user()->cannot('viewAny', Doanphi::class)) {
            return $this->sendResponse(null, 'Khong du quyen!');
        }
        $doanphi = Doanphi::all();
        return $this->sendResponse($doanphi, 'Lay danh sach doan phi thanh cong!');

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
        if (\Auth::user()->cannot('create', Doanphi::class)) {
            return $this->sendResponse(null, 'Khong du quyen!');
        }
        $input = $request->all();

        $validator = Validator::make($input, [
            'MaDV' => 'required',
            'HK1' => 'required',
            'HK2' => 'required',
            'HK3' => 'required',
            'HK4' => 'required',
            'HK5' => 'required',
            'HK6' => 'required',
            'HK7' => 'required',
            'HK8' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $doanphi = Doanphi::create($input);

        return $this->sendResponse($doanphi, 'Tao doan phi thanh cong.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doanphi = Doanphi::find($id);
        if (is_null($doanphi)) {
            return $this->sendError('Khong tim thay doan phi.');
        }

        if (\Auth::user()->cannot('view', $doanphi)) {
            return $this->sendResponse(null, 'Khong du quyen!');
        }

        return $this->sendResponse(new Response($doanphi), 'Hien thi doan phi thanh cong.');
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
