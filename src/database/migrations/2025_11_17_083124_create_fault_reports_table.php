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
    Schema::create('fault_reports', function (Blueprint $table) {
        $table->id();

        $table->unsignedBigInteger('user_id');     // nhân viên báo hỏng
        $table->unsignedBigInteger('device_id')->nullable(); // thiết bị liên quan

        // --- Các cột theo mẫu 04 ---
        $table->string('department')->nullable();       // Đơn vị báo sửa chữa
        $table->string('sent_to')->nullable();          // Kính gửi ai
        $table->string('device_name')->nullable();      // Tên thiết bị đề nghị sửa chữa
        $table->string('unit')->nullable();             // Đơn vị tính
        $table->integer('quantity')->nullable();        // Số lượng (bằng số)
        $table->string('quantity_text')->nullable();    // Số lượng (bằng chữ)
        $table->string('location')->nullable();         // Địa điểm
        $table->string('device_status')->nullable();    // Tình trạng

        // Mô tả chi tiết
        $table->text('description');

        // Trạng thái xử lý
        $table->enum('status', ['pending', 'processing', 'done'])
              ->default('pending');

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fault_reports');
    }
};
