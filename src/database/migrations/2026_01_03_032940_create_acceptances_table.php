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
    Schema::create('acceptances', function (Blueprint $table) {
        $table->id();
        $table->string('device_name');
        $table->date('repair_date');
        $table->text('acceptance_result');
        $table->unsignedBigInteger('accepted_by')->nullable(); // user id (technician)
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acceptances');
    }
};
