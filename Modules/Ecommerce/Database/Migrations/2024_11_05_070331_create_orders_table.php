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
        if (!Schema::hasTable('orders')) {
            Schema::create('orders', function (Blueprint $table) {
                $table->id();
                $table->integer('user_id');
                $table->string('order_id');
                $table->decimal('subtotal',28,8);
                $table->decimal('shipping_charge',28,8);
                $table->decimal('total',28,8);
                $table->integer('shipping_method_id');
                $table->text('address');
                $table->string('payment_method');
                $table->tinyInteger('payment_status');
                $table->tinyInteger('order_status');
                $table->string('transaction_id')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
