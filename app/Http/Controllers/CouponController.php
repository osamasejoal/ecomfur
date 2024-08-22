<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{

    /*--------------------------------------------------------------------------
    index method
    --------------------------------------------------------------------------*/
    public function index()
    {
        $coupons = Coupon::all();
        return view('backend.coupon.view', compact('coupons'));
    }

    /*--------------------------------------------------------------------------
    create method
    --------------------------------------------------------------------------*/
    public function create()
    {
        return view('backend.coupon.add');
    }

    /*--------------------------------------------------------------------------
    store method
    --------------------------------------------------------------------------*/
    public function store(Request $request)
    {
        // Validation for Create Coupon
        $request->validate([
            'name' => 'nullable|string|max:100',
            'code' => 'required|string|unique:coupons,code',
            'discount' => 'required|integer|min:1|max:100',
            'validity' => 'nullable|date|after_or_equal:today',
            'limit' => 'nullable|integer|min:1',
        ], [
            '*.required' => 'This field is required',
            '*.integer' => 'This field must be an integer',
            '*.string' => 'This field must be string',
            'name.max' => 'The maximum character limit is 100',
            'code.unique' => 'This field must be unique',
            'discount.min' => 'The minimum discount percent is 1',
            'discount.max' => 'The maximum discount percent is 100',
            'validity.date' => 'Please enter a valid date',
            'validity.after_or_equal' => 'The validity must be after or equal to today',
            'limit.min' => 'The minimum limit is 1',
        ]);

        $coupon = new Coupon();

        // Creating Coupon
        $coupon->name = $request->name;
        $coupon->code = $request->code;
        $coupon->discount = $request->discount;
        $coupon->validity = $request->validity;
        $coupon->limit = $request->limit;
        $coupon->save();

        return back()->with('success', 'Successfully Created your Coupon');
    }

    /*--------------------------------------------------------------------------
    edit method
    --------------------------------------------------------------------------*/
    public function edit($id)
    {
        $coupon = Coupon::find($id);
        return view('backend.coupon.edit', compact('coupon'));
    }

    /*--------------------------------------------------------------------------
    update method
    --------------------------------------------------------------------------*/
    public function update(Request $request, $id)
    {
        $coupon = Coupon::find($id);

        if ($coupon) {

            // Validation for Create Coupon
            $request->validate([
                'validity' => 'nullable|date|after_or_equal:today',
                'limit' => 'nullable|integer|min:1',
            ], [
                'validity.date' => 'Please enter a valid date',
                'validity.after_or_equal' => 'The validity must be after or equal to today',
                'limit.integer' => 'This field must be an integer',
                'limit.min' => 'The minimum limit is 1',
                'validity.date' => 'Please enter a valid date',
                'validity.after_or_equal' => 'The validity must be after or equal to today',
            ]);

            // Updating Coupon
            $coupon->validity = $request->validity;
            $coupon->limit = $request->limit;
            $coupon->save();

            return back()->with('success', 'Successfully Updated your Coupon');
        } else {
            return back()->with('Warning', 'Sorry! Coupon not found');
        }
    }

    /*--------------------------------------------------------------------------
    destroy method
    --------------------------------------------------------------------------*/
    public function destroy($id)
    {
        $coupon = Coupon::find($id);

        if ($coupon) {

            $coupon->delete();

            return back()->with('success', 'Successfully Deleted your Coupon.');
        } else {
            return back()->with('warning', 'Sorry! Coupon not found.');
        }
    }

    /*--------------------------------------------------------------------------
    toggle Status method
    --------------------------------------------------------------------------*/
    public function toggleStatus(Request $request, $id)
    {
        $coupon = Coupon::find($id);
        $coupon->status = $request->status;
        $coupon->save();

        return response()->json(['message' => 'Coupon status updated successfully.']);
    }
}
