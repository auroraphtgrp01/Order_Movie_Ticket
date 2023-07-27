<?php

namespace App\Http\Controllers;

use App\Models\LichChieu;
use Illuminate\Http\Request;

class LichChieuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.page.lich_chieu.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LichChieu $lichChieu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LichChieu $lichChieu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LichChieu $lichChieu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LichChieu $lichChieu)
    {
        //
    }
}
