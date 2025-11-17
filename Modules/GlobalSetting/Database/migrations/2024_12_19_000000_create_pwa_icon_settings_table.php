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
        Schema::create('pwa_icon_settings', function (Blueprint $table) {
            $table->id();
            $table->string('icon_size'); // e.g., '72x72', '96x96', '128x128', etc.
            $table->string('icon_path')->nullable(); // Path to the uploaded icon
            $table->string('icon_type')->default('image/png'); // MIME type
            $table->string('purpose')->default('any maskable'); // Purpose of the icon
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pwa_icon_settings');
    }
};
