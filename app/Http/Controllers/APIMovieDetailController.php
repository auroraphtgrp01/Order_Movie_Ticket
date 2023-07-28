<?php

namespace App\Http\Controllers;

use App\Models\MovieDetail;
use App\Models\Phim;
use Illuminate\Http\Request;

class APIMovieDetailController extends Controller
{
    public function getFirst($sentence)
    {
        $words = explode(' ', $sentence);
        $wordCount = count($words);

        if ($wordCount > 2) {
            return $words[0] . ' ' . $words[1];
        } else if ($wordCount <= 2) {
            return $words[0];
        } else {
            return '';
        }
    }
    function getWords($sentence)
    {
        $words = explode(' ', $sentence);
        $wordCount = count($words);

        if ($wordCount > 3) {
            $result = array_slice($words, 2);
        } elseif ($wordCount > 1) {
            $result = array_slice($words, 1);
        } else {
            $result = $words;
        }

        return implode(' ', $result);
    }
    public function data(Request $request)
    {
        $movie = Phim::find($request->id);
        if ($movie) {
            $ten_dau = (string)$this->getFirst($movie->ten_phim);
            $ten_cuoi = (string)$this->getWords($movie->ten_phim);
            MovieDetail::query()->delete();
            MovieDetail::create([
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
        } else {
            return response()->json([
                'status' => 0,
                'message' => 'Phim Không Tồn Tại !'
            ]);
        }
    }
    public function dataGet()
    {
        $data = MovieDetail::all();
        $movie = Phim::all();
        if (count($data) == 1) {
            $dataGet = MovieDetail::first();
            $movie_arr = $movie->toArray();
            shuffle($movie_arr);
            $rcm_movie = array_slice($movie_arr, 0, 4);
            return response()->json([
                'data' => $dataGet,
                'data_rcm' => $rcm_movie,
            ]);
        } else {
            return redirect('/');
        }
    }
}
