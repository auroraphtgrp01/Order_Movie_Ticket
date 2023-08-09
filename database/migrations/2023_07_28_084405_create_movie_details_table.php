<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movie_details', function (Blueprint $table) {
            $table->id();
            $table->string('ten_phim_dau');
            $table->string('id_phim');
            $table->string('ten_phim_cuoi');
            $table->string('slug_phim');
            $table->string('hinh_anh');
            $table->string('dao_dien');
            $table->string('dien_vien');
            $table->string('the_loai');
            $table->integer('thoi_luong');
            $table->string('ngon_ngu');
            $table->string('rated');
            $table->longText('mo_ta');
            $table->string('trailer');
            $table->date('bat_dau');
            $table->date('ket_thuc');
            $table->integer('hien_thi')->comment('0: Không hiển thị trang chủ, 1: Hiển thị trang chủ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_details');
    }
};
