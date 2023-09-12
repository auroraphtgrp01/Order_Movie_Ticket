<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TestController extends Controller
{
    public function create()
    {
        Session::start();
        Session::put('s_1', 'sdsd');
        return response('x')->withCookie(Cookie('c_1'));
    }
    public function index()
    {
        return view('thong_ke.chart');
    }
}
