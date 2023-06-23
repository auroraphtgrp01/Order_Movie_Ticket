<?php

namespace App\Http\Controllers;

use App\Models\PhongChieu;
use Illuminate\Http\Request;

class APIPhongChieuController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        PhongChieu::create($data);
        return response()->json([
            'status' => true,
            'message' => 'Đã thêm mới thành công!'
        ]);
    }
    public function data()
    {
        $data = PhongChieu::get();
        return response()->json([
            'data' => $data,
        ]);
    }
    public function status(Request $request)
    {
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
        $data = PhongChieu::find($request->id);
        if ($data) {
            return response()->json([
                'status' => 1,
                'data' => $data
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'message' => "Không có !"
            ]);
        }
    }
    public function delete(Request $request)
    {
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
}
