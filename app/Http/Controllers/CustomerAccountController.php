<?php

namespace App\Http\Controllers;

use App\Jobs\sendMailJob;
use App\Mail\sendEmail;
use App\Models\CustomerAccount;
use App\Models\DonHang;
use App\Models\QuyenChucNang;
use App\Models\VeXemPhim;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\TryCatch;

class CustomerAccountController extends Controller
{
    public function store(Request $request)
    {
        $data               = $request->all();
        $data['is_block']   =   0;
        $data['tinh_trang'] =   0;
        $data['password']   = bcrypt($request->password);
        $data['hashID'] = Str::uuid();
        CustomerAccount::create($data);
        $mail['name'] = $request->ho_va_ten;
        $mail['token'] = 'http://127.0.0.1:8000/confirmation/' . $data['hashID'];
        // Mail::to($request->email)->send(new sendEmail('Đăng ký tài khoản thành công', 'client.mail.create_account', $mail));
        sendMailJob::dispatch($request->email, 'Đăng ký tài khoản thành công', 'client.mail.create_account', $mail);
        return response()->json([
            'status' => true,
            'message' => 'Đã thêm mới thành công'
        ]);
    }
    public function confirmation ($id) {
        $acc = CustomerAccount::where('hashID', $id)->first();
        if($acc) {
            $acc->tinh_trang = 1;
            $acc->hashID = null;
            $acc->save();
            toastr()->success('Đã kích hoạt tài khoản thành công !');
            return redirect('/login');
        } else {
            toastr()->error('Lỗi !');
            return redirect( '/' );
        }
    }
    public function data()
    {
        // $id_chuc_nang   =   19;
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
        $data   = CustomerAccount::get();
        return response()->json([
            'xxx'    => $data,
        ]);
    }
    public function block(Request $request)
    {
        // $id_chuc_nang   =   21;
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
        // $id_chuc_nang   =   20;
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
        // $id_chuc_nang   =   23;
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

        // $id_chuc_nang   =   24;
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
        return view('client.page.register_login.register');
    }
    public function viewLogin()
    {
        return view('client.page.register_login.index');
    }
    public function login(Request $request)
    {

        $check = Auth::guard('client')->attempt(['email' => $request->email, 'password' => $request->password]);
        if ($check) {
            if(Auth::guard('client')->user()->tinh_trang == 0) {
                return response()->json([
                    'status' => 0,
                    'message' => 'Vui lòng xác thực tài khoản !'
                ]);
            }
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

        // $check  = CustomerAccount::where('email', $request->email)
        //     ->first();
        // $passwordInput = $request->password;
        // $passwordSave  = $check->password;
        // if ($check && password_verify($passwordInput, $passwordSave)) {
        //     Session::start();
        //     Session::put('auth', $check);
        //     return response()->json([
        //         'status' => 1,
        //         'message' => 'Đăng Nhập Thành Công !'
        //     ]);
        // } else {
        //     return response()->json([
        //         'status' => 0,
        //         'message' => 'Đăng Nhập Thất Bại !'
        //     ]);
        // }
    }
    public function viewForgotPassword()
    {
        return view('client.page.register_login.forget');
    }

    public function viewChangePassword($id)
    {
        $acc = CustomerAccount::where('tokenPassword', $id)->first();
        if($acc) {
            return view('client.page.register_login.reset_password', compact('id'));
        } else {
            toastr()->error('Liên Kết Không Tồn Tại !');
            return redirect('/');
        }
    }
    public function forget(Request $request) {

        DB::beginTransaction();
        try {
            $acc = CustomerAccount::where('email', $request->email)->first();
            if($acc) {
                $acc -> tokenPassword = Str::uuid();
                $acc -> save();
                DB::commit();
                $info['link'] = "http://127.0.0.1:8000/change-password/". $acc->tokenPassword;
                $info['name'] = $acc->ho_va_ten;
                Mail::to($request->email)->send(new sendEmail('YÊU CẦU ĐẶT LẠI MẬT KHẨU','client.mail.forget_password',$info));
                return response()->json([
                    'status' => 1,
                    'message' =>'Vui lòng kiểm tra email !'
                ]);
            } else {
                return response()->json([
                    'status'=> 0,
                    'message'=>'Email Không Tồn Tại !'
                ]);
            }
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }
    public function changePassword(Request $request) {
      $acc = CustomerAccount::where('tokenPassword', $request->token)->first();
        if($acc) {
            $acc->password = bcrypt($request->password);
            $acc->tokenPassword = null;
            $acc->save();
            return response()->json([
                'status' => 1,
                'message' => 'Đổi mật khẩu thành công !'
            ]);
        } else {
           toastr()->error('Liên kết không tồn tại !');
           return redirect('/');
        }
    }
    public function userInfo(){
        $user = Auth::guard('client')->user();
        if($user) {
            return response()->json([
                'status' => 1,
                'data' => $user
            ]);
        } else {
            return response()->json([
                'status' => 0,
            ]);
        }

    }
    public function logOut() {
        Auth::guard('client')->logout();
        return response()->json([
            'status' => 1,
            'message' => 'Đăng xuất thành công !'
        ]);

    }
    public function orderList(Request $request) {
        $data = DonHang::where('id_khach_hang', Auth::guard('client')->user()->id)->get();
        return response()->json([
            'data'=>$data,
        ]);
    }
    public function ticketList(Request $request) {
        $id_don_hang = $request->ma_don_hang;
        $data = VeXemPhim::where('id_don_hang', $id_don_hang)
        // $data = DonHang::where('don_hangs.ma_don_hang', $id_don_hang)
            // ->leftJoin('ve_xem_phims', 've_xem_phims.id_don_hang', 'don_hangs.id')
        // ->join('ve_xem_phims', 've_xem_phims.id_don_hang', 'don_hangs.id')
        // ->select('ve_xem_phims.*')
        ->join('lich_chieus', 'lich_chieus.id', 've_xem_phims.id_lich_chieu')
        ->join('phims','phims.id','lich_chieus.id_phim')
        ->select('phims.ten_phim','lich_chieus.gio_bat_dau', 'lich_chieus.gio_ket_thuc','ve_xem_phims.*')
        ->get();
        return response()->json([
            'data'=>$data,
        ]);

    }
}
