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
        Schema::table('projects', function (Blueprint $table) {
            $table->string('theme_2_thumb_image')->nullable()->after('thumb_image');
            $table->string('theme_3_thumb_image')->nullable()->after('theme_2_thumb_image');
            $table->string('details_thumb_image')->nullable()->after('theme_2_thumb_image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('theme_2_thumb_image');
            $table->dropColumn('theme_3_thumb_image');
            $table->dropColumn('details_thumb_image');
        });
    }
};
