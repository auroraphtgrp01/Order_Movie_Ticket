<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhongChieuController extends Controller
{
    public function index()
    {
        return view('admin.page.phongchieu.index');
    }
}
