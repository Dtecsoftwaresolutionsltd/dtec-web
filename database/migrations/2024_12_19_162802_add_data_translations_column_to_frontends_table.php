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
        Schema::table('frontends', function (Blueprint $table) {
            if (!Schema::hasColumn('frontends', 'data_translations')) {
                $table->longText('data_translations')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('frontends', function (Blueprint $table) {
            if (Schema::hasColumn('frontends', 'data_translations')) {
                $table->dropColumn('data_translations');
            }
        });
    }
};
