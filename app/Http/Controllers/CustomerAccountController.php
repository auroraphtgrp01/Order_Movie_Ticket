<?php

namespace App\Http\Controllers;

use App\Models\CustomerAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerAccountController extends Controller
{
    public function store(Request $request)
    {
        $data               = $request->all();
        $data['is_block']   =   0;
        $data['tinh_trang'] =   0;
        $data['password']   = bcrypt($request->password);
        CustomerAccount::create($data);
        return response()->json([
            'status' => true,
            'message' => 'Đã thêm mới thành công'
        ]);
    }
    public function data()
    {
        $data   = CustomerAccount::get();
        return response()->json([
            'xxx'    => $data,
        ]);
    }
    public function block(Request $request)
    {
        $ds = CustomerAccount::find($request->id);
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
        $ds = CustomerAccount::find($request->id);
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
        $ds = CustomerAccount::find($request->id);
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
        $ds = CustomerAccount::find($request->id);
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
    public function viewResgister()
    {
        return view('client.page.register_login.index');
    }
    public function viewLogin()
    {
        return view('client_view.page.register_login.index');
    }
    public function login(Request $request)
    {
        $check  = CustomerAccount::where('email', $request->email)
            ->first();
        $passwordInput = $request->password;
        $passwordSave  = $check->password;
        if ($check && password_verify($passwordInput, $passwordSave)) {
            Session::start();
            Session::put('auth', $check);
            return response()->json([
                'status' => 1,
                'message' => 'Đăng Nhập Thành Công !'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'message' => 'Đăng Nhập Thất Bại !'
            ]);
        }
    }
}
