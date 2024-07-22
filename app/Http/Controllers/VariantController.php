<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Models\Variant;
use App\Models\Product;
use App\Models\Size;

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
        $products   = Product::all();
        $colors     = Color::all();
        $sizes      = Size::all();
        return view('backend.variant.add', compact('products', 'colors', 'sizes'));
    }

    /*--------------------------------------------------------------------------
    store method
    --------------------------------------------------------------------------*/
    public function store(Request $request)
    {
        // Validation for Create Variant
        $request->validate([
            'product_id'    => 'required|integer',
            'stock'         => 'required|integer|min:1',
        ], [
            '*.required'    => 'This field is required',
            '*.integer'     => 'This field must be an integer',
            'stock.min'     => 'The minimum value for this field is 1',
        ]);

        $variant = new Variant();

        // Creating Variant
        $variant->product_id    = $request->product_id;
        $variant->color         = Color::where('id', $request->color_id)->first()->title;
        $variant->color_code    = Color::where('id', $request->color_id)->first()->code;
        $variant->size          = $request->size;
        $variant->stock         = $request->stock;
        $variant->save();

        return back()->with('success', 'Successfully Created your Variant');
    }

    /*--------------------------------------------------------------------------
    edit method
    --------------------------------------------------------------------------*/
    public function edit($id)
    {
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

            return redirect()->route('variant.view')->with('success', 'Successfully Updated your Variant');
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
