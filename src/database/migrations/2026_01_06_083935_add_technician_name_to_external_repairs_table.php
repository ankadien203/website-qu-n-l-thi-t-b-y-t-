<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('external_repairs', function (Blueprint $table) {
            $table->string('technician_name')->nullable()->after('supplier_company');
        });
    }

    public function down(): void
    {
        Schema::table('external_repairs', function (Blueprint $table) {
            $table->dropColumn('technician_name');
        });
    }
};

