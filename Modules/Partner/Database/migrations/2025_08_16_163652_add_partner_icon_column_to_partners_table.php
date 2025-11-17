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
        Schema::table('partners', function (Blueprint $table) {
            $table->string('home_three_icon')->nullable()->after('logo');
            $table->string('home_four_icon')->nullable()->after('home_three_icon');
            $table->string('home_six_icon')->nullable()->after('home_four_icon');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('partners', function (Blueprint $table) {
            $table->dropColumn('home_theree_icon');
            $table->dropColumn('home_four_icon');
            $table->dropColumn('home_six_icon');
        });
    }
};
