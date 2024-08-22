<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    /*--------------------------------------------------------------------------
    index method
    --------------------------------------------------------------------------*/
    public function index()
    {
        $categories = Category::all();
        return view('backend.category.view', compact('categories'));
    }

    /*--------------------------------------------------------------------------
    create method
    --------------------------------------------------------------------------*/
    public function create()
    {
        return view('backend.category.add');
    }

    /*--------------------------------------------------------------------------
    store method
    --------------------------------------------------------------------------*/
    public function store(Request $request)
    {
        // Validation for Create Category
        $request->validate([
            'name'  => ['required', 'unique:categories,name', 'regex:/^[A-Za-z0-9\s]+$/'],
            'image' => 'image|mimes:jpg,jpeg,png,gif,svg,webp',
        ], [
            'name.required'    => 'This field is required',
            'name.unique'      => 'This field must be unique',
            'name.regex'       => 'This field only contain letters, numbers, and spaces.',
            'image.image'       => 'This field must be an image',
            'image.mimes'       => 'Image must be a file of type: jpg, jpeg, png, gif, svg, webp.',
        ]);

        $category = new Category();

        // Image Upload for Create Category
        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = date('d-m-Y-H-i-s') . Str::random('5') . '.' . $image->getClientOriginalExtension();
            //Image::make($image)->resize(1680,900)->save('upload/slider_images/' . $imageName);
            $image->move(public_path('upload/category_images'), $imageName);
            $image_path = 'upload/category_images/' . $imageName;

            $category->image = $image_path;
        }

        // Creating Category
        $category->name    = $request->name;
        $category->slug     = Str::slug($request->name);
        $category->save();

        return back()->with('success', 'Successfully Created your Category');
    }

    /*--------------------------------------------------------------------------
    edit method
    --------------------------------------------------------------------------*/
    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('backend.category.edit', compact('category'));
    }

    /*--------------------------------------------------------------------------
    update method
    --------------------------------------------------------------------------*/
    public function update(Request $request, $slug)
    {
        $category = Category::where('slug', $slug)->first();

        if ($category) {

            // Validation for Update Category
            $request->validate([
                'name' => ['required', 'regex:/^[A-Za-z0-9\s]+$/', 'unique:categories,name,' . $category->id],
                'image' => 'image|mimes:jpg,jpeg,png,gif,svg,webp',
            ], [
                'name.required' => 'This field is required',
                'name.unique'   => 'This field must be unique',
                'name.regex'    => 'This field only contain letters, numbers, and spaces.',
                'image.image'   => 'This field must be an image',
                'image.mimes'   => 'Image must be a file of type: jpg, jpeg, png, gif, svg, webp.',
            ]);

            // Image Upload for Update Category
            if ($request->file('image')) {
                if (File::exists($category->image)) {
                    unlink($category->image);
                }
                $image = $request->file('image');
                $imageName = date('d-m-Y-H-i-s') . Str::random('5') . '.' . $image->getClientOriginalExtension();
                //Image::make($image)->resize(1680,900)->save('upload/slider_images/' . $imageName);
                $image->move(public_path('upload/category_images'), $imageName);
                $image_path = 'upload/category_images/' . $imageName;

                $category->image = $image_path;
            }

            // Updating Category
            $category->name = $request->name;
            $category->slug = Str::slug($request->name);
            $category->save();

            return redirect()->route('category.view')->with('success', 'Successfully Updated your Category');
        }
        else {
            return back()->with('Warning', 'Sorry! Category not found');
        }

    }

    /*--------------------------------------------------------------------------
    destroy method
    --------------------------------------------------------------------------*/
    public function destroy($slug)
    {
        $category = Category::where('slug', $slug)->first();

        if ($category) {
            if (File::exists($category->image)) {
                unlink($category->image);
            }

            $category->delete();

            return back()->with('success', 'Successfully Deleted your Category.');
        } else {
            return back()->with('warning', 'Sorry! Category not found.');
        }

    }
    
    /*--------------------------------------------------------------------------
    toggle Featured method
    --------------------------------------------------------------------------*/
    public function toggleFeatured(Request $request, $id)
    {
        $category = Category::find($id);
        $category->featured = $request->featured;
        $category->save();

        return response()->json(['message' => 'Featured status updated successfully.']);
    }
}
