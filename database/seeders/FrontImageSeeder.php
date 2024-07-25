<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FrontImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('front_images')->insert([
            'welcolme_or_offer_image'   => 'seeder_images/front_image_welcolme_or_offer_image.jpg',
            'gallery_image_1'           => 'seeder_images/front_image_gallery_image_1.jpg',
            'gallery_image_2'           => 'seeder_images/front_image_gallery_image_2.jpg',
            'gallery_image_3'           => 'seeder_images/front_image_gallery_image_3.jpg',
            'gallery_image_4'           => 'seeder_images/front_image_gallery_image_4.jpg',
            'product_icon_1'            => 'seeder_images/front_image_product_icon_1.png',
            'product_icon_2'            => 'seeder_images/front_image_product_icon_2.png',
            'product_icon_3'            => 'seeder_images/front_image_product_icon_3.png',
            'product_icon_4'            => 'seeder_images/front_image_product_icon_4.png',
            'product_icon_5'            => 'seeder_images/front_image_product_icon_5.png',
            'created_at'                => now(),
            'updated_at'                => now(),
        ]);
    }
}
