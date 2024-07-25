<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\FrontImage;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Product;


class FrontendController extends Controller
{
    public function index(){
        $services = Service::all();
        $products = Product::all();
        $featured_category = Category::where('featured', 'on')->get();
        $welcome_offer_image = FrontImage::select('welcolme_or_offer_image')->first();
        $gallery_images = FrontImage::select('gallery_image_1', 'gallery_image_2', 'gallery_image_3', 'gallery_image_4')->first();
        $product_icon = FrontImage::select('product_icon_1', 'product_icon_2', 'product_icon_3', 'product_icon_4', 'product_icon_5')->first();

        return view('frontend.index', compact('products', 'services', 'featured_category', 'welcome_offer_image', 'gallery_images', 'product_icon'));
    }
}
