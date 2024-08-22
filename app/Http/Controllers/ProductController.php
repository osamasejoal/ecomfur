<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    /*--------------------------------------------------------------------------
    index method
    --------------------------------------------------------------------------*/
    public function index()
    {
        // $products = Product::all();
        $products = Product::orderBy('id', 'desc')->get();
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
            'description'   => 'required',
            'images.*'      => 'required|image|mimes:jpg,jpeg,png,gif,svg,webp',
            'thumbnail'     => 'required|image|mimes:jpg,jpeg,png,gif,svg,webp',
        ], [
            '*.required'            => 'This field is required',
            '*.unique'              => 'This field must be unique',
            'category_id.integer'   => 'Please Choose a Category',
            'price.numeric'         => 'The value of this field must be numeric',
            'images.*.required'     => 'This field is required',
            'images.*.image'        => 'This field must be an image',
            'images.*.mimes'        => 'Image must be a file of type: jpg, jpeg, png, gif, svg, webp.',
            'thumbnail.required'    => 'This field is required',
            'thumbnail.image'       => 'This field must be an image',
            'thumbnail.mimes'       => 'Image must be a file of type: jpg, jpeg, png, gif, svg, webp.',
        ]);

        $product = new Product();

        // Multiple Images Upload for Create Product
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = date('d-m-Y-H-i-s') . Str::random('5') . '.' . $image->getClientOriginalExtension();
                $path = $image->move(public_path('upload/product_images'), $filename);
                $imagePaths[] = 'upload/product_images/' . $filename;

                $product->images = json_encode($imagePaths);
            }
        }
        else {
            return "Images cannot be uploaded";
        }

        // Thumbnail Upload for Create Product
        if ($request->file('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = date('d-m-Y-H-i-s') . Str::random('5') . '.' . $thumbnail->getClientOriginalExtension();
            //Image::make($image)->resize(1680,900)->save('upload/slider_images/' . $imageName);
            $thumbnail->move(public_path('upload/product_images'), $thumbnailName);
            $thumbnail_path = 'upload/product_images/' . $thumbnailName;

            $product->thumbnail = $thumbnail_path;
        }

        // Creating Product
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->code = $request->code;
        $product->price = $request->price;
        // $product->discount = $request->discount;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->save();

        return back()->with('success', 'Successfully Created your Product');
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
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if ($product) {

            // Validation for Create Product
            $request->validate([
                'name' => 'required|unique:products,name,' . $product->id,
                'price' => 'required|numeric',
                'description' => 'required',
                'images.*' => 'image|mimes:jpg,jpeg,png,gif,svg,webp',
            ], [
                '*.required' => 'This field is required',
                '*.integer' => 'This field must be an integer',
                '*.unique' => 'This field must be unique',
                'price.numeric' => 'The value of this field must be numeric',
                'images.*.image' => 'This field must be an image',
                'images.*.mimes' => 'Image must be a file of type: jpg, jpeg, png, gif, svg, webp.',
            ]);

            // Images Upload for Update Product
            $images = [];
            
            // Check if images already exist, if so, decode them
            if ($product->images) {
                $images = json_decode($product->images, true);
            }

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $filename = date('d-m-Y-H-i-s') . Str::random('5') . '.' . $image->getClientOriginalExtension();
                    $path = 'upload/product_images/' . $filename;
                    $image->move(public_path('upload/product_images'), $filename);
                    
                    $images[] = $path;
                }
            }
            
            // Updating Product
            $product->images = json_encode($images);
            $product->name = $request->name;
            $product->slug = Str::slug($request->name);
            $product->price = $request->price;
            $product->short_description = $request->short_description;
            $product->description = $request->description;
            $product->save();

            return back()->with('success', 'Successfully Updated your Product');
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

    
    
    /*--------------------------------------------------------------------------
    product Details method
    --------------------------------------------------------------------------*/
    public function productDetails($slug)
    {
        $product = Product::where('slug', $slug)->with('variant')->firstOrFail();
        $product->images = json_decode($product->images);
        $total_stock = Variant::where('product_id', $product->id)->sum('stock');

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return view('backend.product.single_product', compact('product', 'total_stock'));
    }
    
    /*--------------------------------------------------------------------------
    toggle Best Sale method
    --------------------------------------------------------------------------*/
    public function toggleBestSale(Request $request, $id)
    {
        $product = Product::find($id);
        $product->best_sale = $request->best_sale;
        $product->save();

        return response()->json(['message' => 'Best Sale status updated successfully.']);
    }
    
    /*--------------------------------------------------------------------------
    toggle Status method
    --------------------------------------------------------------------------*/
    public function toggleStatus(Request $request, $id)
    {
        $product = Product::find($id);
        $product->status = $request->status;
        $product->save();

        return response()->json(['message' => 'Product status updated successfully.']);
    }
    
    /*--------------------------------------------------------------------------
    delete Image method
    --------------------------------------------------------------------------*/
    public function deleteImage(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|string',
        ]);
    
        $product = Product::find($id);
    
        // Decode the current JSON images
        $images = json_decode($product->images, true) ?? [];
    
        // Remove the image from the array
        $images = array_filter($images, function($img) use ($request) {
            return $img !== $request->image;
        });
    
        // Delete the image file
        Storage::disk('public')->delete($request->image);
    
        // Update the database with the new images array
        $product->images = json_encode(array_values($images));
        $product->save();
    
        return redirect()->back()->with('success', 'Image deleted successfully!');
    }
}
