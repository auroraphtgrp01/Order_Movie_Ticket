<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\QuyenChucNang;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class APIAdminController extends Controller
{
    public function data()
    {
        // $id_chuc_nang   =   2;
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
        $data = Admin::all();
        return response()->json([
            'data' => $data,
        ]);
    }
    public function store(Request $request)
    {
        // $id_chuc_nang   =   1;
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
        DB::beginTransaction();
        try {
            $data   = $request->all();
            $data['password'] = bcrypt($data['password']);
            Admin::create($data);
            DB::commit();

            return response()->json([
                'status'    => true,
                'message'   => 'Đã thêm mới phim thành công!'
            ]);
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }
    public function destroy(Request $request)
    {
        // $id_chuc_nang   =   5;
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
        // $id_chuc_nang   =   2;
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
        // $id_chuc_nang   =   4;
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


        DB::beginTransaction();
        try {
            $admin   = Admin::find($request->id);
            if ($admin) {
                $data   = $request->all();
                $data['password'] = bcrypt($data['password']);
                $admin->update($data);
                DB::commit();
                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã xóa phim thành công!'
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Phim không tồn tại!'
                ]);
            }
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }
    public function loginAdmin(Request $request)
    {
        $check  = Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]);
        if ($check == true) {
            return response()->json([
                'status' => 1,
                'message' => 'Đã đăng nhập thành công !'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'message' => 'Sai tài khoản hoặc mật khẩu !',
            ]);
        }
    }
    public function logout(Request $request){
        $check = Auth::guard('admin')->check();
        if($check){
            Auth::guard('admin')->logout();
            return response()->json([
                'status' => 1,
                'message' => 'Đã đăng xuất thành công !'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'message' => 'Có lỗi xảy ra trong quá trình logout, vui lòng liên hệ admin !',
            ]);
        }
    }
}
