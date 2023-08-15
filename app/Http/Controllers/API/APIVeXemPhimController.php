<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class APIVeXemPhimController extends Controller
{
    public function order(Request $request)
    {
        dd($request->all());
    }
}
