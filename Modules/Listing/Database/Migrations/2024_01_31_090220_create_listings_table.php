<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('sub_category_id');
            $table->string('thumb_image')->nullable();
            $table->string('slug');
            $table->text('features')->nullable();
            $table->string('purpose')->nullable();
            $table->bigInteger('total_view')->default(0);
            $table->decimal('regular_price', 8, 2);
            $table->decimal('offer_price', 8, 2)->nullable();
            $table->string('status')->default('disable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listings');
    }
};
