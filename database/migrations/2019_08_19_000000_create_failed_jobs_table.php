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
    Schema::create('failed_jobs', function (Blueprint $table) {
        $table->id();
        $table->string('uuid', 36)->unique(); // Giới hạn số ký tự cho uuid là 36
        $table->string('connection', 255); // Giới hạn số ký tự cho connection là 255
        $table->string('queue', 255); // Giới hạn số ký tự cho queue là 255
        $table->longText('payload'); // Không giới hạn số ký tự cho payload
        $table->longText('exception');
        $table->timestamp('failed_at')->useCurrent();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('failed_jobs');
    }
};
