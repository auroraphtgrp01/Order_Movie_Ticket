<?php

namespace App\Http\Controllers;

use App\Models\GheChieu;
use App\Models\PhongChieu;
use Illuminate\Http\Request;

class GheChieuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id_phong)
    {
        $phong = PhongChieu::find($id_phong);
        if ($phong) {
            return view('admin.page.ghe_chieu.index');
        } else {
            return redirect('/admin/phong-chieu');
        }
    }
}
