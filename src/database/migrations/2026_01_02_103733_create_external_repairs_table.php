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
    Schema::create('external_repairs', function (Blueprint $table) {
        $table->id();
        $table->string('device_name');
        $table->unsignedInteger('quantity')->default(1);
        $table->string('supplier_company');
        $table->unsignedBigInteger('requested_by')->nullable();
        $table->string('status')->default('pending'); // pending/approved/rejected (tuỳ bạn)
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('external_repairs');
    }
};
