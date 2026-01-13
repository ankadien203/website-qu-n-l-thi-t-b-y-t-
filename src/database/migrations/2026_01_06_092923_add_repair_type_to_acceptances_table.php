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
    Schema::table('acceptances', function (Blueprint $table) {
        $table->string('repair_type')->default('internal'); 
        // internal = sửa chữa nội bộ, external = sửa chữa bên ngoài
    });
}

    public function down(): void
{
    Schema::table('acceptances', function (Blueprint $table) {
        $table->dropColumn('repair_type');
    });
}

};
