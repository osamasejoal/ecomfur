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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            // $table->foreignId('sub_category_id')->nullable()->constrained('sub_categories')->onDelete('cascade');
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('code')->unique();
            $table->string('brand')->nullable();
            $table->decimal('price', 8, 2);
            $table->integer('discount')->nullable();
            $table->mediumText('short_description')->nullable();
            $table->longText('description');
            $table->json('images');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
