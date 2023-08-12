<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestViewController extends Controller
{
    public function index()
    {
        return view('adminPage.phong_chieu.index');
    }
}
