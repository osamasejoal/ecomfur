<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert([
            // Service-1
            [
                'title'     => 'Courier Service',
                'sub_title' => 'Get free shipping inside Dhaka, 10% cashback on delivery charge in all Bangladesh. Instant free returns.*',
                'icon'      => 'seeder_images/service_icon_1.png'
            ],

            // Service-2
            [
                'title'     => 'Safe Payment',
                'sub_title' => 'Bkash, Nagad, Bank Transfer, wherever you are comfortable. We assure 100% secure transaction.',
                'icon'      => 'seeder_images/service_icon_2.png'
            ],

            // Service-3
            [
                'title'     => 'Online Support',
                'sub_title' => 'Our Support team always here to assist you! Just a click you are away from!',
                'icon'      => 'seeder_images/service_icon_3.png'
            ],
        ]);
    }
}
