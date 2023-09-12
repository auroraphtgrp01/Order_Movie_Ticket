<?php

namespace App\Http\Controllers;

use App\Models\DichVu;
use App\Models\DonVi;
use App\Models\QuyenChucNang;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class APIDichVuController extends Controller
{
    public function store(Request $request)
    {
        $id_chuc_nang   =   29;
        $user_login     =   Auth::guard('admin')->user();

        $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
            ->where('id_chuc_nang', $id_chuc_nang)
            ->first();
        if (!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }
        DB::beginTransaction();
        try {
            $data   = $request->all();
            DichVu::create($data);
            DB::commit();
            return response()->json([
                'status'    => 1,
                'message'   => 'Đã thêm mới dịch vụ thành công!',
            ]);
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }
    public function data()
    {

        $id_chuc_nang   =   30;
        $user_login     =   Auth::guard('admin')->user();

        $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
            ->where('id_chuc_nang', $id_chuc_nang)
            ->first();
        if (!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }
        $data = DichVu::join('don_vis', 'don_vis.id', 'dich_vus.id_don_vi')
            ->select('dich_vus.*', 'don_vis.ten_don_vi')
            ->get();
        return response()->json([
            'status' => 1,
            'data' => $data,
        ]);
    }
    public function status(Request $request)
    {
        $id_chuc_nang   =   33;
        $user_login     =   Auth::guard('admin')->user();

        $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
            ->where('id_chuc_nang', $id_chuc_nang)
            ->first();
        if (!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }
        DB::beginTransaction();
        try {
            $dichVu = DichVu::find($request->id);
            if ($dichVu) {
                $dichVu->tinh_trang = $dichVu->tinh_trang == 1 ? 0 : 1;
                $dichVu->save();
                DB::commit();
                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã cập nhật dịch vụ thành công!',
                ]);
            } else {
                return response()->json([
                    'status' => 0,
                    'message' => 'Dịch vụ không tồn tại !',
                ]);
            }
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }
    public function update(Request $request)
    {
        $id_chuc_nang   =   32;
        $user_login     =   Auth::guard('admin')->user();

        $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
            ->where('id_chuc_nang', $id_chuc_nang)
            ->first();
        if (!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }
        DB::beginTransaction();
        try {
            $dichVu = DichVu::find($request->id);

            if ($dichVu) {
                $data = $request->all();
                $dichVu->update($data);
                DB::commit();
                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã cập nhật dịch vụ thành công!',
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Dịch vụ không tồn tại!',
                ]);
            }
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }
    public function delete(Request $request)
    {
        $id_chuc_nang   =   31;
        $user_login     =   Auth::guard('admin')->user();

        $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
            ->where('id_chuc_nang', $id_chuc_nang)
            ->first();
        if (!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }
        DB::beginTransaction();
        try {
            $dichVu = DichVu::find($request->id);
            if ($dichVu) {
                $dichVu->delete();
                DB::commit();
                return response()->json([
                    'status' => 1,
                    'message' => 'Đã xoá dịch vụ thành công !'
                ]);
            } else {
                return response()->json([
                    'status' => 0,
                    'message' => 'LooixF'
                ]);
            }
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }
}
