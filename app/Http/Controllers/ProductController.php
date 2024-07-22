<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    /*--------------------------------------------------------------------------
    index method
    --------------------------------------------------------------------------*/
    public function index()
    {
        $products = Product::all();
        return view('backend.product.view', compact('products'));
    }

    /*--------------------------------------------------------------------------
    create method
    --------------------------------------------------------------------------*/
    public function create()
    {
        $categories = Category::all();
        return view('backend.product.add', compact('categories'));
    }

    /*--------------------------------------------------------------------------
    store method
    --------------------------------------------------------------------------*/
    public function store(Request $request)
    {
        // Validation for Create Product
        $request->validate([
            'category_id'   => 'required|integer',
            'name'          => 'required|unique:products,name',
            'code'          => 'required|unique:products,code',
            'price'         => 'required|numeric',
            'discount'      => 'nullable|integer|min:1|max:100',
            'description'   => 'required',
            'images'        => 'required|image|mimes:jpg,jpeg,png,gif,svg,webp',
        ], [
            '*.required'            => 'This field is required',
            '*.unique'              => 'This field must be unique',
            'category_id.integer'   => 'This field must be an integer',
            'price.numeric'         => 'The value of this field must be numeric',
            'discount.min'          => 'The minimum discount percent is 1',
            'discount.integer'      => 'This field must be an integer',
            'discount.max'          => 'The maximum discount percent is 100',
            'images.image'          => 'This field must be an image',
            'images.mimes'          => 'Image must be a file of type: jpg, jpeg, png, gif, svg, webp.',
        ]);

        $product = new Product();

        // Multiple Images Upload for Create Product
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = time() . '_' . Str::random('5') . '.' . $image->getClientOriginalName();
                $path = $image->move(public_path('upload/product_images'), $filename);
                $imagePaths[] = 'upload/product_images' . $filename;

                $product->images = json_encode($imagePaths);
            }
        }

        // Creating Product
        $product->category_id       = $request->category_id;
        $product->name              = $request->name;
        $product->slug              = Str::slug($request->name);
        $product->code              = $request->code;
        $product->brand             = $request->brand;
        $product->price             = $request->price;
        $product->discount          = $request->discount;
        $product->short_description = $request->short_description;
        $product->description       = $request->description;
        $product->save();

        return back()->with('success', 'Successfully Created your Product');
    }

    /*--------------------------------------------------------------------------
    product Details method
    --------------------------------------------------------------------------*/
    public function productDetails($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $product->images = json_decode($product->images);
        return view('backend.product.single_product', compact('product'));
    }

    /*--------------------------------------------------------------------------
    edit method
    --------------------------------------------------------------------------*/
    public function edit($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('backend.product.edit', compact('product'));
    }

    /*--------------------------------------------------------------------------
    update method
    --------------------------------------------------------------------------*/
    public function update(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->first();

        if ($product) {

            // Validation for Create Product
            $request->validate([
                'name'          => 'required|unique:products,name,' . $product->id,
                'price'         => 'required|numeric',
                'discount'      => 'nullable|integer|min:1|max:100',
                'description'   => 'required',
            ], [
                '*.required'    => 'This field is required',
                '*.integer'     => 'This field must be an integer',
                '*.unique'      => 'This field must be unique',
                'price.numeric' => 'The value of this field must be numeric',
                'discount.min'  => 'The minimum discount percent is 1',
                'discount.max'  => 'The maximum discount percent is 100',
            ]);

            // Updating Product
            $product->name              = $request->name;
            $product->slug              = Str::slug($request->name);
            $product->brand             = $request->brand;
            $product->price             = $request->price;
            $product->discount          = $request->discount;
            $product->short_description = $request->short_description;
            $product->description       = $request->description;
            $product->save();

            return redirect()->route('product.view')->with('success', 'Successfully Updated your Product');
        } else {
            return back()->with('Warning', 'Sorry! Product not found');
        }
    }

    /*--------------------------------------------------------------------------
    destroy method
    --------------------------------------------------------------------------*/
    public function destroy($slug)
    {
        $product = Product::where('slug', $slug)->first();

        if ($product) {

            $product->delete();

            return redirect()->route('product.view')->with('success', 'Successfully Deleted your Product');
        } else {
            return back()->with('warning', 'Sorry! Product not found.');
        }
    }
}
