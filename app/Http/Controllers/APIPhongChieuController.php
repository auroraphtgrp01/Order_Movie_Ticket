<?php

namespace App\Http\Controllers;

use App\Models\PhongChieu;
use App\Models\QuyenChucNang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class APIPhongChieuController extends Controller
{
    public function store(Request $request)
    {
        // $id_chuc_nang   =   12;
        // $user_login     =   Auth::guard('admin')->user();

        // $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
        //     ->where('id_chuc_nang', $id_chuc_nang)
        //     ->first();
        // if (!$check) {
        //     return response()->json([
        //         'status'    => 0,
        //         'message'   => 'Bạn không có quyền cho chức năng này!',
        //     ]);
        // }

        $data = $request->all();
        PhongChieu::create($data);
        return response()->json([
            'status' => true,
            'message' => 'Đã thêm mới thành công!',
        ]);
    }
    public function data()
    {
        // $id_chuc_nang   =   13;
        // $user_login     =   Auth::guard('admin')->user();

        // $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
        //     ->where('id_chuc_nang', $id_chuc_nang)
        //     ->first();
        // if (!$check) {
        //     return response()->json([
        //         'status'    => 0,
        //         'message'   => 'Bạn không có quyền cho chức năng này!',
        //     ]);
        // }
        $data = PhongChieu::get();
        return response()->json([
            'data' => $data,
        ]);
    }
    public function status(Request $request)
    {

        // $id_chuc_nang   =   14;
        // $user_login     =   Auth::guard('admin')->user();

        // $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
        //     ->where('id_chuc_nang', $id_chuc_nang)
        //     ->first();
        // if (!$check) {
        //     return response()->json([
        //         'status'    => 0,
        //         'message'   => 'Bạn không có quyền cho chức năng này!',
        //     ]);
        // }

        $data = PhongChieu::find($request->id);
        // dd($data);
        if ($data) {
            if ($data->tinh_trang == 0) {
                $data->tinh_trang = 1;
            } else {
                $data->tinh_trang = 0;
            }
            $data->save();
            return response()->json([
                'status' => 1,
                'message' => "Thành công !",
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'message' => " Không thành công !",
            ]);
        }
    }
    public function info(Request $request)
    {
        // $id_chuc_nang   =   15;
        // $user_login     =   Auth::guard('admin')->user();

        // $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
        //     ->where('id_chuc_nang', $id_chuc_nang)
        //     ->first();
        // if (!$check) {
        //     return response()->json([
        //         'status'    => 0,
        //         'message'   => 'Bạn không có quyền cho chức năng này!',
        //     ]);
        // }
        $data = PhongChieu::find($request->id);
        if ($data) {
            return response()->json([
                'status' => 1,
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'message' => "Không có !",
            ]);
        }
    }
    public function delete(Request $request)
    {
        // $id_chuc_nang   =   16;
        // $user_login     =   Auth::guard('admin')->user();

        // $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
        //     ->where('id_chuc_nang', $id_chuc_nang)
        //     ->first();
        // if (!$check) {
        //     return response()->json([
        //         'status'    => 0,
        //         'message'   => 'Bạn không có quyền cho chức năng này!',
        //     ]);
        // }
        $data = PhongChieu::find($request->id);
        if ($data) {
            $data->delete();
            return response()->json([
                'status' => 1,
                'message' => "Xoá thành công !",
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'message' => "Xoá không thành công !",
            ]);
        }
    }
    public function update(Request $request)
    {
        // $id_chuc_nang   =   17;
        // $user_login     =   Auth::guard('admin')->user();

        // $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
        //     ->where('id_chuc_nang', $id_chuc_nang)
        //     ->first();
        // if (!$check) {
        //     return response()->json([
        //         'status'    => 0,
        //         'message'   => 'Bạn không có quyền cho chức năng này!',
        //     ]);
        // }
        $phongchieu = PhongChieu::find($request->id);
        if ($phongchieu) {
            $data = $request->all();
            $phongchieu->update($data);
            return response()->json([
                'status' => 1,
                'message' => 'Update thành công !',
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'message' => 'Không thành công !',
            ]);
        }
    }
}
