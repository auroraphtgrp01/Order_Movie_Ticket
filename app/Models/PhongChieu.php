<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongChieu extends Model
{
    protected $table = 'phong_chieus';
    protected $fillable = [
        'ten_phong',
        'loai_may',
        'hang_ngang',
        'hang_doc',
        'tinh_trang',
        'loai_phong',
    ];
    use HasFactory;
}
