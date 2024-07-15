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
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('coupon_id')->constrained('coupons');
            $table->json('address');
            $table->enum('status', ['pending', 'cancelled', 'processing', 'on_way', 'delivered'])->default('pending');
            $table->string('payment_method');
            $table->enum('payment_status', ['paid', 'unpaid', 'partial'])->default('unpaid');
            $table->string('transaction_id')->nullable();
            $table->decimal('security_fee', 8, 2)->nullable();
            $table->decimal('total_price', 8, 2);
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
