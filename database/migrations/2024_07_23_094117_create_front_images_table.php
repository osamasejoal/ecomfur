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
        Schema::create('front_images', function (Blueprint $table) {
            $table->id();
            $table->string('welcolme_or_offer_image');
            $table->string('gallery_image_1');
            $table->string('gallery_image_2');
            $table->string('gallery_image_3');
            $table->string('gallery_image_4');
            $table->string('product_icon_1');
            $table->string('product_icon_2');
            $table->string('product_icon_3');
            $table->string('product_icon_4');
            $table->string('product_icon_5');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('front_images');
    }
};
