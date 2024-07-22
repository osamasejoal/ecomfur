<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SliderImage;
use Illuminate\Support\Facades\File;

class SliderImageController extends Controller
{
    
    /*--------------------------------------------------------------------------
    index method
    --------------------------------------------------------------------------*/
    public function index()
    {
        $SliderImages = SliderImage::all();
        return view('frontend.SliderImage.view', compact('SliderImages'));
    }

    /*--------------------------------------------------------------------------
    create method
    --------------------------------------------------------------------------*/
    public function create()
    {
        return view('frontend.SliderImage.add');
    }

    /*--------------------------------------------------------------------------
    store method
    --------------------------------------------------------------------------*/
    public function store(Request $request)
    {
        // Validation for Create Slider Image
        $request->validate([
            'image'     => 'required|image|mimes:jpg,jpeg,png,gif,svg,webp',
        ], [
            'image.required'    => 'This field is required',
            'image.image'       => 'This field must be an image',
            'image.mimes'       => 'Image must be a file of type: jpg, jpeg, png, gif, svg, webp.',
        ]);

        $SliderImage = new SliderImage();

        // Image Upload for Create Slider Image
        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = rand() . '.' . $image->getClientOriginalName();
            //Image::make($image)->resize(1680,900)->save('upload/slider_images/' . $imageName);
            $image->move(public_path('upload/slider_images'), $imageName);
            $image_path = 'upload/slider_images/' . $imageName;

            $SliderImage->image = $image_path;
        }

        // Creating Slider Image
        $SliderImage->title     = $request->title;
        $SliderImage->slogan    = $request->slogan;
        $SliderImage->save();

        return back()->with('success', 'Successfully Created your Slider Image');
    }

    /*--------------------------------------------------------------------------
    destroy method
    --------------------------------------------------------------------------*/
    public function destroy($id)
    {
        $SliderImage = SliderImage::find($id);

        if ($SliderImage) {
            if (File::exists($SliderImage->image)) {
                unlink($SliderImage->image);
            }

            $SliderImage->delete();

            return back()->with('success', 'Successfully Deleted your Slider Image.');
        } else {
            return back()->with('warning', 'Sorry! Slider Image not found.');
        }
    }
}
