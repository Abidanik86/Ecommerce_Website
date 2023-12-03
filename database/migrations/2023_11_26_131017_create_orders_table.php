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
            $table->id('oid');
            $table->string('product_name')->nullable();
            $table->integer('product_price')->nullable();
            $table->integer('product_quantity')->nullable();
            $table->string('user_name')->nullable();
            $table->integer('user_phone')->nullable();
            $table->string('user_email')->nullable();
            $table->string('user_address')->nullable();
            $table->string('payment_method')->nullable();
            $table->integer('total_amount')->nullable();
            $table->enum('status', ['active', 'canceled'])->default('active');
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
