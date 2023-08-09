<?php

namespace App\Http\Controllers;

use App\Models\MovieDetail;
use App\Models\Phim;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomePageController extends Controller
{
    public function view()
    {
        return view('client.page.Homepage.homepage');
    }
    public function details(Request $request)
    {
        $url = $request->url();
        $slug = Str::afterLast($url, '/');
        $movie = Phim::where('slug_phim', $slug)->first();
        if ($movie) {
            return view('client.page.Homepage.details');
        } else {
            return redirect('/');
        }
    }

    public function index()
    {
        $today          = Carbon::today();
        $phimDangChieu  = Phim::where('hien_thi', 1)
            ->whereDate('bat_dau', '<=', $today)
            ->whereDate('ket_thuc', '>=', $today)
            ->get();

        $phimSapChieu  = Phim::where('hien_thi', 1)
            ->whereDate('bat_dau', '>', $today)
            ->get();

        return view('client.page.Homepage.homepage', compact('phimDangChieu', 'phimSapChieu'));
    }
    public function detail($id)
    {
        $phim = Phim::find($id);
        if ($phim) {
            $today          = Carbon::today();
            $phimDangChieu  = Phim::where('hien_thi', 0)
                ->whereDate('bat_dau', '<=', $today)
                ->whereDate('ket_thuc', '>=', $today)
                ->get();

            return view('client.page.phimDetail', compact('phim', 'phimDangChieu'));
        } else {
            return redirect('/');
        }
    }
}
