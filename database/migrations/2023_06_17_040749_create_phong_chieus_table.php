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
        Schema::create('phong_chieus', function (Blueprint $table) {
            $table->id();
            $table->string('ten_phong');
            $table->string('loai_may_chieu');
            $table->integer('hang_ngang');
            $table->integer('hang_doc');
            $table->integer('tinh_trang');
            $table->string('loai_phong')->comment('Phòng 2D, 3D, IMAX');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phong_chieus');
    }
};
