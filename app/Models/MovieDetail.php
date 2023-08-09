<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieDetail extends Model
{
    use HasFactory;
    protected $table = 'movie_details';
    protected $fillable = [
        'id_phim',
        'ten_phim_dau',
        'ten_phim_cuoi',
        'slug_phim',
        'hinh_anh',
        'dao_dien',
        'dien_vien',
        'the_loai',
        'thoi_luong',
        'ngon_ngu',
        'rated',
        'mo_ta',
        'trailer',
        'bat_dau',
        'ket_thuc',
        'hien_thi',
    ];
}
