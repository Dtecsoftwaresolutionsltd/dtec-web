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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('listing_id');
            $table->integer('buyer_id');
            $table->integer('seller_id');
            $table->integer('rating');
            $table->text('review');
            $table->string('status')->default('disable');
            $table->string('review_by')->default('buyer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
