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
        Schema::create('ghe_chieus', function (Blueprint $table) {
            $table->id();
            $table->string('ten_ghe');
            $table->integer('tinh_trang');
            $table->integer('gia_mac_dinh');
            $table->integer('id_phong_chieu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ghe_chieus');
    }
};
