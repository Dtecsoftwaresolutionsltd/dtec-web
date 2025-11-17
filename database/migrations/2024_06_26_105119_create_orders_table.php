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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->integer('buyer_id');
            $table->integer('seller_id');
            $table->integer('listing_id');
            $table->integer('listing_package_id');
            $table->decimal('total_amount', 8, 2)->default(0.00);
            $table->decimal('package_amount', 8, 2)->default(0.00);
            $table->decimal('additional_amount', 8, 2)->default(0.00);

            $table->string('package_name');
            $table->text('package_description');
            $table->string('delivery_date')->default(0);
            $table->string('revision')->default(0);
            $table->string('fn_website')->default('no');
            $table->string('number_of_page')->default(0);
            $table->string('responsive')->default('no');
            $table->string('source_code')->default('no');
            $table->string('content_upload')->default('no');
            $table->string('speed_optimized')->default('no');

            $table->string('payment_method');
            $table->string('payment_status')->default('pending');
            $table->string('transaction_id');
            $table->string('order_status')->default('pending');
            $table->string('approved_by_seller')->default('pending');
            $table->string('completed_by_buyer')->default('pending');

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
