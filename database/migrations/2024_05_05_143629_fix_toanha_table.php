<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('toanha', function (Blueprint $table) {
            $table->renameColumn('MaToaNha', 'ma_toa_nha');
            $table->renameColumn('TenToaNha', 'ten_toa_nha');
            $table->renameColumn('SoLuongCanho', 'so_luong_can_ho');
            $table->renameColumn('SoTang', 'so_tang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('toanha', function (Blueprint $table) {
            $table->renameColumn('ma_toa_nha', 'MaToaNha');
            $table->renameColumn('ten_toa_nha', 'TenToaNha');
            $table->renameColumn('so_luong_can_ho', 'SoLuongCanho');
            $table->renameColumn('so_tang', 'SoTang');
        });
    }
};
