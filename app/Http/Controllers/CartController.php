<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    /*--------------------------------------------------------------------------
    store method
    --------------------------------------------------------------------------*/
    public function store(Request $request, $id)
    {
        $request->validate([
            'vairant_id' => 'integer',
        ]);

        $status = Cart::where('user_id', auth()->id())->where('product_id', $id)->first();

        if (isset($status->user_id) and isset($id)) {
            return back()->with('warning', 'This item is already in the Cart');
        } else {
            $cart = new Cart();
            $cart->user_id = auth()->id();
            $cart->product_id = $id;
            $cart->variant_id = $request->variant_id;
            $cart->save();

            return back()->with('success', $cart->product->name . ' added to your Cart');
        }
    }

    /*--------------------------------------------------------------------------
    destroy method
    --------------------------------------------------------------------------*/
    public function destroy($id)
    {
        $cart = Cart::find($id);

        if ($cart) {
            $cart->delete();
            return back()->with('success', 'Successfully Deleted ' . $cart->product->name . ' from Cart.');
        } else {
            return back()->with('warning', 'Sorry! ' . $cart->product->name . ' not found in Cart.');
        }
    }

    /*--------------------------------------------------------------------------
    update method
    --------------------------------------------------------------------------*/
    public function update(Request $request)
    {
        $cart = Cart::find($request->cart_id);

        if ($request->variant_id) {
            $cart->variant_id = $request->variant_id;
        }

        if ($request->quantity) {
            $cart->quantity = $request->quantity;
        }

        $cart->save();

        $totalPrice = $cart->product->price * $cart->quantity;

        return response()->json([
            'total_price' => $totalPrice,
            'variant_color' => $cart->variant->color ?? null,
        ]);
    }

    /*--------------------------------------------------------------------------
    clear cart method
    --------------------------------------------------------------------------*/
    public function clear_cart()
    {
        $carts = Cart::where('user_id', auth()->id())->get();
        foreach ($carts as $cart) {
            $cart->delete();
        }
        return back()->with('success', 'Your Cart has been cleared.');

    }

    /*--------------------------------------------------------------------------
    apply coupon method
    --------------------------------------------------------------------------*/
    public function apply_coupon(Request $request)
    {
        $request->validate([
            'coupon' => 'required|string',
        ], [
            'coupon.required' => 'This field is required.',
            'coupon.string' => 'This field must be string.',
        ]);

        $couponCode = $request->input('coupon');
        $coupon = Coupon::where('code', $couponCode)->first();

        if (!$coupon) {
            return back()->with('error', 'Invalid Coupon!');
        }

        if ($coupon->status !== 'active') {
            return back()->with('error', 'This Coupon is no longer active.');
        }

        if ($coupon->validity && $coupon->validity->isPast()) {
            return back()->with('error', 'This Coupon has expired.');
        }

        if ($coupon->limit <= 0) {
            return back()->with('error', 'Coupon limit has been over.');
        }

        session(['coupon' => $coupon->code]);

        // Calculate discount and total
        $cartTotal = Cart::where('user_id', auth()->id())->sum(DB::raw('quantity * price'));
        $discountAmount = ($cartTotal * $coupon->discount) / 100;
        $totalAfterDiscount = $cartTotal - $discountAmount;

        return response()->json([
            'success' => 'Coupon applied successfully.',
            'discount' => $coupon->discount,
            'total_after_discount' => $totalAfterDiscount,
        ]);

    }
}
