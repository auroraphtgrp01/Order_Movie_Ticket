<?php

namespace App\Http\Controllers;

use App\Models\Phim;
use Illuminate\Http\Request;

class APIPHIMController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        Phim::create($data);
        return response()->json([
            'status' => true,
            'message' => 'Đã thêm mới phim thành công!'
        ]);
    }
    public function data()
    {
        $data = Phim::get();
        return response()->json([
            'data' => $data,
        ]);
    }
}
