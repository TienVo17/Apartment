<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cudan', function (Blueprint $table) {
            // Thêm cột CCCD với giới hạn 12 ký tự

            $table->string('CCCD', 12)->nullable()->after('DiaChi');
            $table->String('AnhDaiDien')->nullable()->after('CCCD');
            // Thêm cột rentStart và rentEnd
            $table->date('RentStart')->nullable()->after('CCCD');
            $table->date('RentEnd')->nullable()->after('RentStart');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cudan', function (Blueprint $table) {
            // Xóa cột CCCD, rentStart và rentEnd nếu tồn tại
            $table->dropColumn('CCCD');
            $table->dropColumn('AnhDaiDien');
            $table->dropColumn('RentStart');
            $table->dropColumn('RentEnd');
        });
    }
};
