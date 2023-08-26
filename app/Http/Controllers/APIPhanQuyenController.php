<?php

namespace App\Http\Controllers;

use App\Models\ChucNang;
use App\Models\PhanQuyen;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class APIPhanQuyenController extends Controller
{
    public function data()
    {
        $data = PhanQuyen::get();
        return response()->json([
            'data'   => $data,
        ]);
    }
    public function dataChucNang()
    {
        $data = ChucNang::get();
        return response()->json([
            'status' => 1,
            'data' => $data,
        ]);
    }
    public function create(Request $request)
    {
        DB::beginTransaction();

        try {
            $data = $request->all();
            PhanQuyen::create($data);
            DB::commit();
            return response()->json([
                'status'    => 1,
                'message'   => 'Đã Thêm Mới Phân Quyền Thành Công !',
            ]);
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();
            return response()->json([
                'status'    => 0,
                'message'   => 'Thêm Mới Phân Quyền Thất Bại !',
            ]);
        }
    }
    public function status(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = PhanQuyen::find($request->id);
            if ($data) {
                if ($data->trang_thai == 0) {
                    $data->trang_thai = 1;
                } else {
                    $data->trang_thai = 0;
                }
            }
            $data->save();
            DB::commit();
            return response()->json([
                'status'    => 1,
                'message'   => 'Đã thay đổi trạng thái !',
            ]);
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();
            return response()->json([
                'status'    => 0,
                'message'   => 'Thất Bại !',
            ]);
        }
    }
    public function update(Request $request)
    {
        DB::beginTransaction();

        try {
            $phanQuyen = PhanQuyen::find($request->id);
            if ($phanQuyen) {
                $data = $request->all();
                $phanQuyen->update($data);
                $phanQuyen->save();
                DB::commit();
                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã cập nhật thành công !',
                ]);
            }
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();
            return response()->json([
                'status'    => 0,
                'message'   => Log::error($e),
            ]);
        }
    }
    public function delete(Request $request)
    {
        DB::beginTransaction();

        try {
            $data = PhanQuyen::find($request->id);
            if ($data) {
                $data->delete();
                DB::commit();
                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã xoá thành công !',
                ]);
            }
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();
            return response()->json([
                'status'    => 0,
                'message'   => Log::error($e),
            ]);
        }
    }
}
