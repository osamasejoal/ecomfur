<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\FrontImage;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Product;
use App\Models\SliderImage;
use App\Models\Testimonial;
use App\Models\Wishlist;

class FrontendController extends Controller
{
    public function index(){
        $sliders = SliderImage::all();
        $services = Service::all();
        $products = Product::with('variant')->where('status', 'active')->latest()->take(8)->get();
        $featured_category = Category::where('featured', 'on')->latest()->take(2)->get();
        $welcome_imgs = FrontImage::select('welcome_img', 'welcome_title', 'welcome_desc')->first();
        $sale_products = Product::where('status', 'active')->where('best_sale', 'on')->with('variant')->latest()->take(4)->get();
        $gallery_imgs = FrontImage::select('gallery_img_1', 'gallery_img_2', 'gallery_img_3', 'gallery_img_4')->first();
        $testimonials = Testimonial::all();
        $product_icons = FrontImage::select('product_icon_1', 'product_icon_2', 'product_icon_3', 'product_icon_4', 'product_icon_5')->first();

        return view('frontend.index', compact('sliders', 'products', 'services', 'featured_category', 'welcome_imgs', 'sale_products', 'gallery_imgs', 'testimonials', 'product_icons'));
    }

    public function wishlist(){
        return view('frontend.pre_order.wishlist');
    }

    public function cart(){
        return view('frontend.pre_order.cart');
    }

    public function category_product($id){
        $category = Category::where('id', $id)->with('product')->first();
        // echo $category;
        // $products = Product::where('category_id', $id)->get();
        return view('frontend.product.category_product', compact('category'));

        // $data = Wishlist::where('user_id', auth()->user()->id)->where('product_id', 1)->with('product')->first();
    }

    public function product_details($id){
        $product = Product::find($id);
        return view('frontend.product.product_details', compact('product'));
    }
}
