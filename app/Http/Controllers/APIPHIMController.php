<?php

namespace App\Http\Controllers;

use App\Models\Phim;
use Illuminate\Http\Request;

class APIPHIMController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        Phim::create($data);
        return response()->json([
            'status' => true,
            'message' => 'Đã thêm mới phim thành công!'
        ]);
    }
    public function update(Request $request)
    {
        $phim = Phim::find($request->id);
        if ($phim) {
            $data = $request->all();
            $phim->update($data);
            return response()->json([
                'status' => 1,
                'message' => 'Đã cập nhật phim thành công'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'message' => 'Không cập nhật phim thành công'
            ]);
        }
    }
    public function data()
    {
        $data = Phim::get();
        return response()->json([
            'data' => $data,
        ]);
    }
    public function status(Request $request)
    {
        $phim = Phim::find($request->id);
        if ($phim) {
            if ($phim->hien_thi == 1) {
                $phim->hien_thi = 0;
            } else {
                $phim->hien_thi = 1;
            }
            $phim->save();
            return response()->json([
                'status' => 1,
                'message' => 'Thành công !'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'message' => 'Phim không tồn tại!'
            ]);
        }
    }
    public function info(Request $request)
    {
        $data = Phim::find($request->id);
        if ($data) {
            return response()->json([
                'status' => 1,
                'data' => $data
            ]);
        }
        return response()->json([
            'status' => 0,
            'message' => 'Phim không tồn tại !'
        ]);
    }
    public function destroy(Request $request)
    {
        $data = Phim::find($request->id);
        if ($data) {
            $data->delete();
            return response()->json([
                'status' => 1,
                'message' => 'Đã xoá thành công !'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'message' => 'Phim không tồn tại !'
            ]);
        }
    }
}
