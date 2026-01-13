<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('fault_reports', function (Blueprint $table) {
            if (!Schema::hasColumn('fault_reports', 'technician_id')) {
                $table->unsignedBigInteger('technician_id')->nullable()->after('user_id');
            }
        });
    }

    public function down(): void
    {
        Schema::table('fault_reports', function (Blueprint $table) {
            if (Schema::hasColumn('fault_reports', 'technician_id')) {
                $table->dropColumn('technician_id');
            }
        });
    }
};
