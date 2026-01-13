<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('internal_repairs', function (Blueprint $table) {
            $table->id();
            $table->string('device_name');
            $table->date('repair_date');
            $table->text('fault');
            $table->text('repair_content');
            $table->string('technician_name');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('internal_repairs');
    }
};
