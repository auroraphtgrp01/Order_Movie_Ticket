<?php

namespace App\Http\Controllers;

use App\Models\DichVu;
use App\Models\DonVi;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class APIDichVuController extends Controller
{
    public function store(Request $request)
    {
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
