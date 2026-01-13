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
    Schema::create('devices', function (Blueprint $table) {
        $table->id();
        $table->string('name');     // tên thiết bị
        $table->string('unit')->nullable();     // đơn vị tính
        $table->integer('quantity')->default(1);
        $table->string('location')->nullable(); // vị trí đặt thiết bị
        $table->string('status')->default('active'); 
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
