<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Variant;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class VariantController extends Controller
{
     
    /*--------------------------------------------------------------------------
    index method
    --------------------------------------------------------------------------*/
    public function index()
    {
        $variants = Variant::all();
        return view('backend.variant.view', compact('variants'));
    }

    /*--------------------------------------------------------------------------
    create method
    --------------------------------------------------------------------------*/
    public function create()
    {
        $products   = Product::orderBy('id', 'desc')->get();
        return view('backend.variant.add', compact('products'));
    }

    /*--------------------------------------------------------------------------
    store method
    --------------------------------------------------------------------------*/
    public function store(Request $request)
    {
        // Validation for Create Variant
        $request->validate([
            'product_id'    => 'required|integer',
            'color'         => 'required',
            'stock'         => 'required|integer|min:1',
        ], [
            '*.required'    => 'This field is required',
            '*.integer'     => 'This field must be an integer',
            'stock.min'     => 'The minimum value for this field is 1',
        ]);

        $variant = new Variant();

        // Creating Variant
        $variant->product_id    = $request->product_id;
        $variant->color         = $request->color;
        $variant->stock         = $request->stock;
        $variant->save();

        return back()->with('success', 'Successfully Created your Variant');
    }

    /*--------------------------------------------------------------------------
    edit method
    --------------------------------------------------------------------------*/
    public function edit($id)
    {
        // Store the previous URL in the session
        Session::put('previous_url', url()->previous());

        $variant = Variant::find($id);
        return view('backend.variant.edit', compact('variant'));
    }

    /*--------------------------------------------------------------------------
    update method
    --------------------------------------------------------------------------*/
    public function update(Request $request, $id)
    {
        $variant = Variant::find($id);

        if ($variant) {

            // Validation for Update Variant
            $request->validate([
                'stock'         => 'required|integer|min:1',
            ], [
                'stock.required'    => 'This field is required',
                'stock.integer'     => 'This field must be an integer',
                'stock.min'         => 'The minimum value for this field is 1',
            ]);

            // Updating Variant
            $variant->stock = $request->stock;
            $variant->save();

            // Retrieve the previous URL from the session
            $previousUrl = Session::pull('previous_url', route('variant.view'));

            return redirect($previousUrl)->with('success', 'Successfully Updated your Variant');
        }
        else {
            return back()->with('Warning', 'Sorry! Variant not found');
        }
    }

    /*--------------------------------------------------------------------------
    destroy method
    --------------------------------------------------------------------------*/
    public function destroy($id)
    {
        $variant = Variant::find($id);

        if ($variant) {

            $variant->delete();

            return back()->with('success', 'Successfully Deleted your Variant.');
        } else {
            return back()->with('warning', 'Sorry! Variant not found.');
        }
    }
}
