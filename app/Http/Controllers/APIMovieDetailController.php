<?php

namespace App\Http\Controllers;

use App\Jobs\sendMailJob;
use App\Mail\sendEmail;
use App\Models\DonHang;
use App\Models\LichChieu;
use App\Models\MovieDetail;
use App\Models\Phim;
use App\Models\VeXemPhim;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
class APIMovieDetailController extends Controller
{
    public function getFirst($sentence)
    {
        $words = explode(' ', $sentence);
        $wordCount = count($words);

        if ($wordCount > 3) {
            return $words[0] . ' ' . $words[1];
        } else if ($wordCount <= 3) {
            return $words[0];
        } else {
            return '';
        }
    }
    function getWords($sentence)
    {
        $words = explode(' ', $sentence);
        $wordCount = count($words);

        if ($wordCount > 4) {
            $result = array_slice($words, 2);
        } elseif ($wordCount > 1) {
            $result = array_slice($words, 1);
        } else {
            $result = '';
        }

        return implode(' ', $result);
    }
    public function data(Request $request)
    {
        $movie = Phim::where('slug_phim', $request->slug_phim)->first();
        if ($movie) {
            $idPhim = $movie->id;
            $now = Carbon::now();
            $dataLichChieu = LichChieu::where('id_phim', $idPhim)
                ->where('trang_thai', 1)
                ->get();
            $movie_arr = Phim::all()->toArray();
            shuffle($movie_arr);
            $rcm_movie = array_slice($movie_arr, 0, 4);
            return response()->json([
                'status' => 1,
                'data' => $movie,
                'data_rcm' => $rcm_movie,
                'data_lc' => $dataLichChieu,
            ]);
        }
    }
    public function data1(Request $request)
    {
        MovieDetail::query()->delete();
        $movie = Phim::where('slug_phim', $request->slug_phim)->first();
        if ($movie) {
            $ten_dau = (string)$this->getFirst($movie->ten_phim);
            $ten_cuoi = (string)$this->getWords($movie->ten_phim);
            MovieDetail::create([
                'id_phim' => $movie->id,
                'ten_phim_dau' => $ten_dau,
                'ten_phim_cuoi' => $ten_cuoi,
                'slug_phim' => $movie->slug_phim,
                'hinh_anh' => $movie->hinh_anh,
                'dao_dien' => $movie->dao_dien,
                'dien_vien' => $movie->dien_vien,
                'the_loai' => $movie->the_loai,
                'thoi_luong' => $movie->thoi_luong,
                'ngon_ngu' => $movie->ngon_ngu,
                'rated' => $movie->rated,
                'mo_ta' => $movie->mo_ta,
                'trailer' => $movie->trailer,
                'bat_dau' => $movie->bat_dau,
                'ket_thuc' => $movie->ket_thuc,
                'hien_thi' => $movie->hien_thi,
            ]);

            $data = MovieDetail::all();
            $movieR = Phim::all();
            if (count($data) == 1) {
                $dataGet = MovieDetail::first();
                $idPhim = $dataGet->id_phim;
                $now = Carbon::now();
                $dataLichChieu = LichChieu::where('id_phim', $idPhim)
                    ->where('trang_thai', 1)
                    ->get();
                $movie_arr = $movieR->toArray();
                shuffle($movie_arr);
                $rcm_movie = array_slice($movie_arr, 0, 4);
                return response()->json([
                    'data' => $dataGet,
                    'data_rcm' => $rcm_movie,
                    'data_lc' => $dataLichChieu,
                ]);
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }
    public function getVe(Request $request)
    {
        $idLichChieu = $request->id_lich_chieu;
        $data = VeXemPhim::where('id_lich_chieu', $idLichChieu)
            ->join('lich_chieus', 'lich_chieus.id', 've_xem_phims.id_lich_chieu')
            ->join('phong_chieus', 'phong_chieus.id', 'lich_chieus.id_phong')
            ->select('ve_xem_phims.*', 'phong_chieus.hang_ngang', 'phong_chieus.hang_doc')
            ->get();
        foreach ($data as $key => $value) {
            $value->choose = 0;
        }
        return response()->json([
            'data' => $data,
            'status' => 1,

        ]);
    }
    public function order(Request $request)
    {
        $login =  Auth::guard('client')->user();
        if ($login) {
            DB::beginTransaction();
            try {
                $checkHash = DonHang::where('hashCheck', $request->hash)->first();
                if(!$checkHash){
                    $donHang = DonHang::create([
                        'id_khach_hang' => $login->id,
                    ]);
                    $donHang->hashCheck = $request->hash;
                    $donHang->ma_don_hang = $donHang->id + 2937;
                    $donHang->hashCode = 'AURORAPHTGRPCINEMA'.$donHang->ma_don_hang .strval(rand(1, 999999));
                    $donHang->save();
                    $tongTien = 0;
                    foreach ($request->order as $key => $value) {
                            $ve = VeXemPhim::find($value['id_ve']);
                            $ve->id_don_hang = $donHang->ma_don_hang;
                            $ve->tinh_trang = \App\Models\VeXemPhim::VE_DANG_GIU_CHO;
                            $ve->save();
                            $tongTien += $ve->gia_ve;
                    }
                    $donHang->tong_tien = $tongTien;
                    $donHang->save();
                    DB::commit();
                    return response()->json([
                        'status' => 1,
                        'data' => $donHang,
                    ]);
                } else {
                    return response()->json([
                        'status' => 0,
                        'data' => $checkHash,
                    ]);
                }
                // $ds_ve_xem_phim         =  VeXemPhim::where('id_don_hang', $donHang->ma_don_hang)
                // ->join('lich_chieus', 've_xem_phims.id_lich_chieu', 'lich_chieus.id')
                // ->join('phims', 'lich_chieus.id_phim', 'phims.id')
                // ->select('phims.ten_phim', 've_xem_phims.*')
                // ->get();
                // $xxx['ho_va_ten']       =  $login->ho_va_ten;
                // $xxx['ds_ve']	        =  $ds_ve_xem_phim;
                // $xxx['tong_tien']       =  $tongTien;
                // $xxx['noi_dung_ck']		=  'TTVXP' . $donHang->ma_don_hang;

                // // Mail::to($login->email)->send(new sendEmail('Thông tin đặt vé xem phim', 'client.mail.order',$xxx));
                // sendMailJob::dispatch($login->email, 'Thông tin đặt vé xem phim', 'client.mail.order', $xxx);


            } catch (Exception $e) {
                Log::error($e);
                DB::rollBack();
            }
        } else {
            return response()->json([
                'status' => 0,
                'message' => 'Tính Năng Này Yêu Cầu Phải Đăng Nhập !'
            ]);
        }
    }
    public function cart(Request $request) {
        $slug = $request->slug;
        $id_lich_chieu = $request->id_lich_chieu;
        $check  = LichChieu::where('lich_chieus.id', $id_lich_chieu)
        ->join('phims','lich_chieus.id_phim','phims.id')
        ->join('phong_chieus','lich_chieus.id_phong', 'phong_chieus.id')
        ->select('phims.ten_phim', 'lich_chieus.*','phong_chieus.hang_ngang','phong_chieus.hang_doc','phims.hinh_anh')
        ->first();
        return response()->json(['data'=>$check]);
    }
    public function payment(Request $request) {
        $data_json = json_encode($request->all());
        $data_base64= base64_encode($data_json);
        $url = "/payment?ticket=" . urlencode($data_base64);
        return response()->json(['url'=>$url]);
           }
    public function paymentOrd(Request $request){
        $ticket ='';
        $url = $request->url;
        $url_parts = parse_url($url);
        if (isset($url_parts['query'])) {
            $query_string = $url_parts['query'];
            $decoded_query = urldecode($query_string);
            $query_parameters = [];
            parse_str($decoded_query, $query_parameters);
            if (isset($query_parameters['ticket'])) {
                $ticket = $query_parameters['ticket'];
            }
    }
    $data = json_decode(base64_decode($ticket), true);
    $movie = $data['movie'];
    $tickets = $data['cart'];
    $hash = $data['hash'];
    return response()->json([
        'movie'=>$movie,
        'tickets'=>$tickets,
        'hasdID' => $hash,
    ]);
}
}
