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
        $welcome_imgs = FrontImage::select('welcome_img', 'welcome_title', 'welcome_desc')->first();
        $gallery_imgs = FrontImage::select('gallery_img_1', 'gallery_img_2', 'gallery_img_3', 'gallery_img_4')->first();
        $product_icons = FrontImage::select('product_icon_1', 'product_icon_2', 'product_icon_3', 'product_icon_4', 'product_icon_5')->first();

        return view('frontend.index', compact('products', 'services', 'featured_category', 'welcome_imgs', 'gallery_imgs', 'product_icons'));
    }

    public function wishlist(){
        $bc_bg_imgs = FrontImage::select('breadcrumb_bg_img')->first();
        return view('frontend.pre_order.wishlist');
    }
}
