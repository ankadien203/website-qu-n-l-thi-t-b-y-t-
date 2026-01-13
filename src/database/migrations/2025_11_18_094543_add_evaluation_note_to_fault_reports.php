<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('fault_reports', function (Blueprint $table) {
            if (!Schema::hasColumn('fault_reports', 'evaluation_note')) {
                $table->text('evaluation_note')->nullable()->after('technician_evaluation');
            }
        });
    }

    public function down(): void
    {
        Schema::table('fault_reports', function (Blueprint $table) {
            if (Schema::hasColumn('fault_reports', 'evaluation_note')) {
                $table->dropColumn('evaluation_note');
            }
        });
    }
};
