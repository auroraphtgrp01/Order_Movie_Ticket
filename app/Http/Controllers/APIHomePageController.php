<?php

namespace App\Http\Controllers;

use App\Models\Phim;
use Illuminate\Http\Request;

class APIHomePageController extends Controller
{
    public function data()
    {
        $data = Phim::all();
        return response()->json([
            'data' => $data
        ]);
    }
}
