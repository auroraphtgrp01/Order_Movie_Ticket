<?php

namespace App\Http\Controllers;

use App\Models\MovieDetail;
use App\Models\Phim;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            // return view('client.page.Homepage.details');
            return view('client_new.page.detail_movie');
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
        return view('client_new.page.homepage', compact('phimDangChieu', 'phimSapChieu'));
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
    public function cart($slug, $id_lich_chieu){
        $auth = Auth::guard('client')->user();
        if($auth){
            return view('client_new.page.cart');
        } else  {
             return redirect('/login');
        }
    }
    public function payment(){
        return view('client_new.page.payment');
    }
    public function orderList() {
        return view('client_new.page.order_list');
    }
}
