<?php

namespace App\Http\Controllers;

use App\Models\Chidoan;
use App\Models\Chucvu;
use App\Models\Doanphi;
use App\Models\Doanvien;
use App\Models\Giu;
use App\Models\Sinhhoat;
use App\Models\Sodoan;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Gate;
use Validator;
use App\Http\Resources\Product as ProductResource;

class DoanvienController extends BaseController
{
    // Return doanphi page
    public function view(Request $request)
    {
        if ($request->user()->can('viewAny', Doanvien::class)) {
            $listCD = Chidoan::all();
            $listCV = Chucvu::all();
            $listCDSorted = [];
            foreach ($listCD as $chidoan) {
                if ($request->user()->can('view', $chidoan)) {
                    array_push($listCDSorted, $chidoan);
                }
            }
            $listCDSortedId = array_map(function (Chidoan $chidoan) {
                return $chidoan->MaCD; }, $listCDSorted);
            $search = isset($request->all()['search']) ? $request->all()['search'] : "";
            if ($search == "") {
                $doanvien = Doanvien::leftJoin('chidoan', 'chidoan.MaCD', '=', 'doanvien.MaCD')->
                    leftJoin('giu', 'doanvien.MaDV', '=', 'giu.MaDV')->
                    leftJoin('chucvu', 'giu.MaChucVu', '=', 'chucvu.MaChucVu')->
                    whereIn('doanvien.MaCD', $listCDSortedId)->
                    select('doanvien.*', 'TenCD', 'TenChucVu')->
                    get();
            } else {
                $doanvien = Doanvien::leftJoin('chidoan', 'chidoan.MaCD', '=', 'doanvien.MaCD')->
                    leftJoin('giu', 'doanvien.MaDV', '=', 'giu.MaDV')->
                    leftJoin('chucvu', 'giu.MaChucVu', '=', 'chucvu.MaChucVu')->
                    whereIn('doanvien.MaCD', $listCDSortedId)->
                    where("doanvien.MaDV", "LIKE", "%" . $search . "%")->
                    orWhere(DB::raw("CONCAT(doanvien.HoDV,' ',doanvien.TenDV)"), "LIKE", "%" . $search . "%")->
                    select('doanvien.*', 'TenCD', 'TenChucVu')->
                    get();
            }

            return view('doanvien', ['listcd' => $listCDSorted, 'listcv' => $listCV, 'search' => $search, 'doanvien' => json_decode(json_encode($doanvien), true)]);
        } else {
            $listCD = Chidoan::all();
            $listCV = Chucvu::all();
            $search = isset($request->all()['search']) ? $request->all()['search'] : "";
            if ($search == "") {
                $doanvien = Doanvien::leftJoin('chidoan', 'chidoan.MaCD', '=', 'doanvien.MaCD')->
                    leftJoin('giu', 'doanvien.MaDV', '=', 'giu.MaDV')->
                    leftJoin('chucvu', 'giu.MaChucVu', '=', 'chucvu.MaChucVu')->
                    where('doanvien.Email', '=', $request->user()->email)->
                    select('doanvien.*', 'TenCD', 'TenChucVu')->
                    first();
            } else {
                $doanvien = Doanvien::leftJoin('chidoan', 'chidoan.MaCD', '=', 'doanvien.MaCD')->
                    leftJoin('giu', 'doanvien.MaDV', '=', 'giu.MaDV')->
                    leftJoin('chucvu', 'giu.MaChucVu', '=', 'chucvu.MaChucVu')->
                    where("doanvien.MaDV", "LIKE", "%" . $search . "%")->
                    orWhere(DB::raw("CONCAT(doanvien.HoDV,' ',doanvien.TenDV)"), "LIKE", "%" . $search . "%")->
                    select('doanvien.*', 'TenCD', 'TenChucVu')->
                    first();
            }
            return view('doanvien-single', ['doanvien' => $doanvien, 'listcd' => $listCD, 'listcv' => $listCV]);
        }

    }

    // Tao doan vien moi
    public function create(Request $request)
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
    // Sua doan vien
    public function update(Request $request)
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

    // View Update Doanvien
    public function viewUpdate(Request $request)
    {
        // must go to repository pattern, but I'm too tired to do it

        $input = $request->all();

        $maDV = $input['MaDV'];
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


    // View Delete Doanvien
    public function viewDelete(Request $request)
    {
        // must go to repository pattern, but I'm too tired to do it

        $input = $request->all();

        $maDV = $input['MaDV'];
        $listCD = Chidoan::all();
        $listCV = Chucvu::all();


        $doanvien = Doanvien::where("MaDV", '=', $maDV)->first();

        if (isset($doanvien)) {

            return view('doanvien-xoa', ['doanvien' => json_decode(json_encode($doanvien), true)]);

        } else {
            abort(404);
        }
    }

    // Xoa doan vien
    public function delete(Request $request)
    {


        $input = $request->all();

        //validation
        $validator = Validator::make($input, [
            'MaDV' => 'required'
        ]);

        $response = new \stdClass;

        if ($validator->fails()) {
            $response->message = "Xóa đoàn viên thất bại, vui lòng kiểm tra thông tin";
            $response->error = $validator->errors();
            $response->status = 0;
        } else {
            $doanvien = Doanvien::where('MaDV', $input['MaDV']);


            Giu::where('MaDV', $input['MaDV'])->delete();

            Doanphi::where('MaDV', $input['MaDV'])->delete();
            Sodoan::where('MaDV', $input['MaDV'])->delete();
            Sinhhoat::where('MaDV', $input['MaDV'])->delete();

            $doanvien->delete();


            $response->message = "Xóa đoàn viên thành công";
            $response->status = 1;
        }

        return $this->sendResponse($response, "OK");
    }
}
