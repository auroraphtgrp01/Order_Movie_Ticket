<?php

namespace App\Http\Controllers;

use App\Models\DanhSachTaiKhoan;
use Illuminate\Http\Request;

class APIDSTaiKhoanController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        DanhSachTaiKhoan::create($data);
        return response()->json([
            'status' => true,
            'message' => 'Đã thêm mới thành công'
        ]);
    }
    public function data()
    {
        $data   = DanhSachTaiKhoan::get();
        return response()->json([
            'xxx'    => $data,
        ]);
    }
    public function block(Request $request)
    {
        $ds = DanhSachTaiKhoan::find($request->id);
        if ($ds) {
            if ($ds->is_block  == 1) {
                $ds->is_block = 0;
            } else {
                $ds->is_block = 1;
            }
            $ds->save();
            return response()->json([
                'status' => 1,
                'message' => 'Đã cập nhật trạng thái !'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'message' => 'Tài khoản không tồn tại !'
            ]);
        }
    }
    public function tinh_trang(Request $request)
    {
        $ds = DanhSachTaiKhoan::find($request->id);
        if ($ds) {
            if ($ds->tinh_trang == 0) {
                $ds->tinh_trang = 1;
            } else {
                $ds->tinh_trang = 0;
            }
            $ds->save();
            return response()->json([
                'status' => 1,
                'message' => 'Đã cập nhật thành công !'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'message' => 'Thất bại !'
            ]);
        }
    }
    public function destroy(Request $request)
    {
        $ds = DanhSachTaiKhoan::find($request->id);
        if ($ds) {
            $ds->delete();
            return response()->json([
                'status' => 1,
                'message' => 'Đã xoá thành công !'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'message' => 'Tài khoản không tồn tại !'
            ]);
        }
    }
    public function update(Request $request)
    {
        $ds = DanhSachTaiKhoan::find($request->id);
        if ($ds) {
            $data = $request->all();
            $ds->update($data);
            return response()->json([
                'status'    => 1,
                'message'   => 'Đã cập nhật thành công!'
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Tài khoản không tồn tại !'
            ]);
        }
    }
}
