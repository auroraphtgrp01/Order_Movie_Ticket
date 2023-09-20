<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestViewController extends Controller
{
    public function index()
    {
        return view('client_new.page.cart');
    }
}
