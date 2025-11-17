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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('sub_category_id')->nullable();
            $table->string('thumb_image');
            $table->string('slug');
            $table->string('website_url');
            $table->string('project_date');
            $table->string('project_fb');
            $table->string('project_x');
            $table->string('project_linkedin');
            $table->string('project_instagram');
            $table->string('status')->default('enable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
