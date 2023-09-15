<?php

namespace App\Http\Controllers;

use App\Models\GheChieu;
use App\Models\LichChieu;
use App\Models\Phim;
use App\Models\PhongChieu;
use App\Models\QuyenChucNang;
use App\Models\VeXemPhim;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class APILichChieuController extends Controller
{
    public function store(Request $request)
    {
        // $id_chuc_nang   =   38;
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
        $data = $request->all();
        LichChieu::create($data);
        return response()->json([
            'status'    => 1,
            'message'   => 'Đã thêm mới lịch chiếu thành công!',
        ]);
    }
    public function data()
    {
        // $id_chuc_nang   =   41;
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
        $data = LichChieu::join('phims', 'phims.id', 'lich_chieus.id_phim')
            ->join('phong_chieus', 'lich_chieus.id_phong', 'phong_chieus.id')
            ->select('lich_chieus.*', 'phims.ten_phim', 'phong_chieus.ten_phong', 'phong_chieus.hang_ngang', 'phong_chieus.hang_doc')
            ->get();
        // dd($data->toArray());
        $today = Carbon::today();
        $ds_phim = Phim::where('hien_thi', 1)
            ->where('ket_thuc', '>', $today)
            ->get();
        $ds_phong = PhongChieu::where('tinh_trang', 1)->get();
        return response()->json([
            'ds_phong' => $ds_phong,
            'ds_phim' => $ds_phim,
            'data1' => $data
        ]);
    }
    public function info(Request $request)
    {
        // $id_chuc_nang   =   43;
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
        $lichChieu  = VeXemPhim::where('id_lich_chieu', $request->id)->get();

        return response()->json([
            'data'    =>  $lichChieu
        ]);
    }
    public function status(Request $request)
    {
        // $id_chuc_nang   =   42;
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
            $data =  LichChieu::find($request->id);
            // change status active -> disable
            if ($data) {
                if ($data->trang_thai == 1) {
                    $check = VeXemPhim::where('id_lich_chieu', $request->id)
                        ->where('tinh_trang', \App\Models\VeXemPhim::VE_DA_BAN)
                        ->first();
                    if ($check) {
                        return response()->json([
                            'status' => 0,
                            'message' => "Lịch chiếu này đã có vé bán !"
                        ]);
                    }
                    VeXemPhim::where('id_lich_chieu', $request->id)->delete();
                    $data->trang_thai = 0;
                    $data->save();
                    DB::commit();
                    return response()->json([
                        'status' => 1,
                        'message' => "Đã Huỷ Lịch Chiếu Phim!"
                    ]);
                    // Disale -> Active
                } else {
                    $check      =   LichChieu::where('trang_thai', 1)
                        ->where('id_phong', $request->id_phong)
                        ->where(function ($query) use ($request) {
                            $query->where('gio_bat_dau', '>=', $request->gio_bat_dau)
                                ->where('gio_ket_thuc', '<=', $request->gio_ket_thuc);
                            $query->orWhere('gio_bat_dau', '<=', $request->gio_bat_dau)
                                ->Where('gio_ket_thuc', '>=', $request->gio_bat_dau);
                            $query->orWhere('gio_bat_dau', '<=', $request->gio_ket_thuc)
                                ->Where('gio_ket_thuc', '>=', $request->gio_ket_thuc);
                        })
                        ->first();
                    if ($check) {
                        return response()->json([
                            'status'    => 0,
                            'message'   => 'Phòng chiếu này đã có lịch chiếu!',
                        ]);
                    }



                    $gheChieu = GheChieu::where('id_phong_chieu', $request->id_phong)->get();
                    if (count($gheChieu) == 0) {
                        return response()->json([
                            'status' => 0,
                            'message' => 'Phòng này chưa có ghế để bán ! Vui lòng hãy tạo ghế cho phòng'
                        ]);
                    } else {
                        foreach ($gheChieu as $key => $value) {
                            VeXemPhim::create([
                                'id_lich_chieu' => $request->id,
                                'so_ghe' => $value->ten_ghe,
                                'ma_ve' => Str::uuid(),
                                'gia_ve' => $value->gia_mac_dinh,
                                'tinh_trang' => $value->tinh_trang == 0 ? \App\Models\VeXemPhim::VE_KHONG_THE_BAN : \App\Models\VeXemPhim::VE_CO_THE_BAN,
                            ]);
                        }
                        $data->trang_thai = 1;
                        $data->save();
                        DB::commit();
                        return response()->json([
                            'status'    => 1,
                            'message'   => 'Đã kích hoạt lịch chiếu phim!',
                        ]);
                    }
                }
            } else {
                return response()->json([
                    'status' => 0,
                    'message' => "Lỗi Thay Đổi Trạng Thái !"
                ]);
            }
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }
    public function update(Request $request)
    {
        // $id_chuc_nang   =   39;
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
        $data = LichChieu::find($request->id);
        if ($data) {
            $check      =   LichChieu::where('trang_thai', 1)
                ->where('id_phong', $request->id_phong)
                ->where(function ($query) use ($request) {
                    $query->where('gio_bat_dau', '>=', $request->gio_bat_dau)
                        ->where('gio_ket_thuc', '<=', $request->gio_ket_thuc);
                    $query->orWhere('gio_bat_dau', '<=', $request->gio_bat_dau)
                        ->Where('gio_ket_thuc', '>=', $request->gio_bat_dau);
                    $query->orWhere('gio_bat_dau', '<=', $request->gio_ket_thuc)
                        ->Where('gio_ket_thuc', '>=', $request->gio_ket_thuc);
                })
                ->first();
            if ($check) {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Trùng lịch chiếu với 1 lịch khác Không thể thực hiện update !',
                ]);
            } else {
                $data->update($request->all());
                return response()->json([
                    'status' => 1,
                    'message' => "Đã Cập Nhật Thành Công !"
                ]);
            }
        } else {
            return response()->json([
                'status' => 0,
                'message' => "Thất Bại !"
            ]);
        }
    }
    public function delete(Request $request)
    {
        // $id_chuc_nang   =   40;
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
            $lichChieu     =   LichChieu::find($request->id);

            if ($lichChieu) {
                // Kiểm tra xem đã có vé nào bán hay chưa?
                $check  = VeXemPhim::where('id_lich_chieu', $request->id)
                    ->where('tinh_trang', \App\Models\VeXemPhim::VE_DA_BAN)
                    ->first();
                if ($check) {
                    return response()->json([
                        'status'    => 0,
                        'message'   => 'Lịch chiếu này đã bán vé cho khách rồi!',
                    ]);
                }
                // Phải hủy toàn bộ vé đã tạo ra
                VeXemPhim::where('id_lich_chieu', $request->id)->delete();

                $lichChieu->delete();

                DB::commit();

                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã xóa lịch chiếu thành công!',
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'lịch chiếu không tồn tại!',
                ]);
            }
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }
    public function lich_chieu_theo_phim(Request $request)
    {
        $data = $request->all();
        dd($data);
    }
}
