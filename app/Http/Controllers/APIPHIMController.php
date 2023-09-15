<?php

namespace App\Http\Controllers;

use App\Models\Phim;
use App\Models\QuyenChucNang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class APIPHIMController extends Controller {
    public function store( Request $request ) {
        // $id_chuc_nang = 6;
        // $user_login = Auth::guard( 'admin' )->user();

        // $check = QuyenChucNang::where( 'id_quyen', $user_login->id_quyen )
        // ->where( 'id_chuc_nang', $id_chuc_nang )
        // ->first();
        // if ( !$check ) {
        //     return response()->json( [
        //         'status' => 0,
        //         'message' => 'Bạn không có quyền cho chức năng này!',
        //     ] );
        // }

        $data = $request->all();
        Phim::create( $data );
        return response()->json( [
            'status' => true,
            'message' => 'Đã thêm mới phim thành công!',
        ] );
    }

    public function update( Request $request ) {
        // $id_chuc_nang = 11;
        // $user_login = Auth::guard( 'admin' )->user();

        // $check = QuyenChucNang::where( 'id_quyen', $user_login->id_quyen )
        // ->where( 'id_chuc_nang', $id_chuc_nang )
        // ->first();
        // if ( !$check ) {
        //     return response()->json( [
        //         'status' => 0,
        //         'message' => 'Bạn không có quyền cho chức năng này!',
        //     ] );
        // }

        $phim = Phim::find( $request->id );
        if ( $phim ) {
            $data = $request->all();
            $phim->update( $data );
            return response()->json( [
                'status' => 1,
                'message' => 'Đã cập nhật phim thành công',
            ] );
        } else {
            return response()->json( [
                'status' => 0,
                'message' => 'Không cập nhật phim thành công',
            ] );
        }
    }

    public function data() {
        // $id_chuc_nang = 7;
        // $user_login = Auth::guard( 'admin' )->user();

        // $check = QuyenChucNang::where( 'id_quyen', $user_login->id_quyen )
        // ->where( 'id_chuc_nang', $id_chuc_nang )
        // ->first();
        // if ( !$check ) {
        //     return response()->json( [
        //         'status' => 0,
        //         'message' => 'Bạn không có quyền cho chức năng này!',
        //     ] );
        // }

        $data = Phim::get();
        return response()->json( [
            'data' => $data,
        ] );
    }

    public function status( Request $request ) {
        // $id_chuc_nang = 8;
        // $user_login = Auth::guard( 'admin' )->user();

        // $check = QuyenChucNang::where( 'id_quyen', $user_login->id_quyen )
        // ->where( 'id_chuc_nang', $id_chuc_nang )
        // ->first();
        // if ( !$check ) {
        //     return response()->json( [
        //         'status' => 0,
        //         'message' => 'Bạn không có quyền cho chức năng này!',
        //     ] );
        // }

        $phim = Phim::find( $request->id );
        if ( $phim ) {
            if ( $phim->hien_thi == 1 ) {
                $phim->hien_thi = 0;
            } else {
                $phim->hien_thi = 1;
            }
            $phim->save();
            return response()->json( [
                'status' => 1,
                'message' => 'Thành công !',
            ] );
        } else {
            return response()->json( [
                'status' => 0,
                'message' => 'Phim không tồn tại!',
            ] );
        }
    }

    public function info( Request $request ) {
        // $id_chuc_nang = 9;
        // $user_login = Auth::guard( 'admin' )->user();

        // $check = QuyenChucNang::where( 'id_quyen', $user_login->id_quyen )
        // ->where( 'id_chuc_nang', $id_chuc_nang )
        // ->first();
        // if ( !$check ) {
        //     return response()->json( [
        //         'status' => 0,
        //         'message' => 'Bạn không có quyền cho chức năng này!',
        //     ] );
        // }

        $data = Phim::find( $request->id );
        if ( $data ) {
            return response()->json( [
                'status' => 1,
                'data' => $data,
            ] );
        }
        return response()->json( [
            'status' => 0,
            'message' => 'Phim không tồn tại !',
        ] );
    }

    public function destroy( Request $request ) {
        // $id_chuc_nang = 10;
        // $user_login = Auth::guard( 'admin' )->user();

        // $check = QuyenChucNang::where( 'id_quyen', $user_login->id_quyen )
        // ->where( 'id_chuc_nang', $id_chuc_nang )
        // ->first();
        // if ( !$check ) {
        //     return response()->json( [
        //         'status' => 0,
        //         'message' => 'Bạn không có quyền cho chức năng này!',
        //     ] );
        // }

        $data = Phim::find( $request->id );
        if ( $data ) {
            $data->delete();
            return response()->json( [
                'status' => 1,
                'message' => 'Đã xoá thành công !',
            ] );
        } else {
            return response()->json( [
                'status' => 0,
                'message' => 'Phim không tồn tại !',
            ] );
        }
    }
}
