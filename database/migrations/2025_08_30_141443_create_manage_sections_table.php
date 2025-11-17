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
        if (!Schema::hasTable('manage_sections')) {
            Schema::create('manage_sections', function (Blueprint $table) {
                $table->id();
                $table->string('page_name');
                $table->string('section_name');
                $table->boolean('status')->default(true);
                $table->integer('serial_number');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manage_sections');
    }
};
