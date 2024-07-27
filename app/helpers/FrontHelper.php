<?php

use App\Models\FrontImage;
use App\Models\Wishlist;
use App\Models\Category;



    /*--------------------------------------------------------------------------
    Breadcrumb Background Image method
    --------------------------------------------------------------------------*/
    function bc_bg_img(){
        return FrontImage::select('breadcrumb_bg_img')->first();
    }

    /*--------------------------------------------------------------------------
    wishlist method
    --------------------------------------------------------------------------*/
    function wishlists(){
        return Wishlist::where('user_id', auth()->id())->get();
    }

    /*--------------------------------------------------------------------------
    wishlist exist method
    --------------------------------------------------------------------------*/
    function wishlist_exist($id){
        return Wishlist::where('user_id', auth()->id())->where('product_id', $id)->first();
    }

    /*--------------------------------------------------------------------------
    categories method
    --------------------------------------------------------------------------*/
    function categories(){
        return Category::all();
    }

?>