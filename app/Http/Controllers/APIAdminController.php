<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class APIAdminController extends Controller
{
    public function data()
    {
        $data = Admin::all();
        return response()->json([
            'data' => $data,
        ]);
    }
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            Admin::create($data);
            DB::commit();
            return response()->json([
                'status' => 1,
                'message' => 'Đã Thêm Thành Công !'
            ]);
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }
    public function destroy(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = Admin::find($request->id);
            if ($data) {
                $data->delete();
                DB::commit();
                return response()->json([
                    'status' => 1,
                    'message' => 'Đã Xoá Thành Công !'
                ]);
            } else {
                return response()->json([
                    'status' => 0,
                    'message' => 'Thất Bại'
                ]);
            }
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }
    public function status(Request $request)
    {
        DB::beginTransaction();
        try {
            $admin = Admin::find($request->id);
            if ($admin) {
                if ($admin->is_block == 1) {
                    $admin->is_block = 0;
                } else {
                    $admin->is_block = 1;
                }
                $admin->save();
                DB::commit();

                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã cập nhật trạng thái!'
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Tài khoản không tồn tại!'
                ]);
            }
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }
    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = Admin::find($request->id);
            if ($data) {
                $admin = $request->all();
                $data->update($admin);
                DB::commit();
                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã cập nhật phim thành công!'
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Không Thành Công !'
                ]);
            }
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }
}
