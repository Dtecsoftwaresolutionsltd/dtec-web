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
        Schema::table('manage_sections', function (Blueprint $table) {
            if (!Schema::hasColumn('manage_sections', 'component_name')) {
                $table->string('component_name')->nullable()->after('section_name');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('manage_sections', function (Blueprint $table) {
            if (Schema::hasColumn('manage_sections', 'component_name')) {
                $table->dropColumn('component_name');
            }
        });
    }
};
