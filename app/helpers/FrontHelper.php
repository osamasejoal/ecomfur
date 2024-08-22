<?php

use App\Models\Cart;
use App\Models\FrontImage;
use App\Models\Wishlist;
use App\Models\Category;
use App\Models\Variant;

    /*--------------------------------------------------------------------------
    Breadcrumb Background Image method
    --------------------------------------------------------------------------*/
    function bc_bg_img(){
        return FrontImage::select('breadcrumb_bg_img')->first();
    }

    /*--------------------------------------------------------------------------
    wishlists method
    --------------------------------------------------------------------------*/
    function wishlists(){
        // return Wishlist::where('user_id', auth()->id())->product();


        return Wishlist::where('user_id', auth()->id())->get();
    }

    /*--------------------------------------------------------------------------
    wishlist exist method
    --------------------------------------------------------------------------*/
    function wishlist_exist($id){
        return Wishlist::where('user_id', auth()->id())->where('product_id', $id)->first();
    }

    /*--------------------------------------------------------------------------
    carts method
    --------------------------------------------------------------------------*/
    function carts(){
        return Cart::where('user_id', auth()->id())->get();
    }

    /*--------------------------------------------------------------------------
    cart exist method
    --------------------------------------------------------------------------*/
    function cart_exist($id){
        return Cart::where('user_id', auth()->id())->where('product_id', $id)->first();
    }

    /*--------------------------------------------------------------------------
    categories method
    --------------------------------------------------------------------------*/
    function categories(){
        return Category::all();
    }

    /*--------------------------------------------------------------------------
    variants method
    --------------------------------------------------------------------------*/
    function variants($id){
        return Variant::where('product_id', $id)->get();
    }

?>