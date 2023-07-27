<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAccount extends Model
{
    use HasFactory;
    protected $table = 'customer_accounts';
    protected $fillable = [
        'email',
        'password',
        'so_dien_thoai',
        'ngay_sinh',
        'dia_chi',
        'ho_va_ten',
        'is_block',
        'tinh_trang',
    ];
}
