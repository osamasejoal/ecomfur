<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{

    /*--------------------------------------------------------------------------
    store method
    --------------------------------------------------------------------------*/
    public function store($id)
    {
        
        $status = Wishlist::where('user_id', auth()->id())->where('product_id', $id)->first();
        
        if (isset($status->user_id) and isset($id)) {
            return back()->with('warning', 'This item is already in the wishlist');
        }
        else {
            $wishlist               = new Wishlist();
            $wishlist->user_id      = auth()->id();
            $wishlist->product_id   = $id;
            $wishlist->save();
    
            return back()->with('success', $wishlist->product->name . 'added to your wishlist');
        }

    }

    /*--------------------------------------------------------------------------
    destroy method
    --------------------------------------------------------------------------*/
    public function destroy($id)
    {
        $wishlist = Wishlist::find($id);

        if ($wishlist) {
            $wishlist->delete();
            return back()->with('success', 'Successfully Deleted' . $wishlist->product->name . ' from your wishlist');
        } else {
            return back()->with('warning', 'Sorry!' . $wishlist->product->name . 'not found in your wishlist.');
        }
    }
}
