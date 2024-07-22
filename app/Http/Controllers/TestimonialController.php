<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
     
    /*--------------------------------------------------------------------------
    index method
    --------------------------------------------------------------------------*/
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('backend.testimonial.view', compact('testimonials'));
    }

    /*--------------------------------------------------------------------------
    create method
    --------------------------------------------------------------------------*/
    public function create()
    {
        return view('backend.testimonial.add');
    }

    /*--------------------------------------------------------------------------
    store method
    --------------------------------------------------------------------------*/
    public function store(Request $request)
    {
        // Validation for Create Testimonial
        $request->validate([
            'name'      => ['required', 'unique:testimonials,name', 'regex:/^[A-Za-z0-9\s]+$/'],
            'comment'   => 'required',
            'image'     => 'image|mimes:jpg,jpeg,png,gif,svg,webp',
        ], [
            '*.required'    => 'This field is required',
            '*.regex'       => 'This field only contain letters, numbers, and spaces.',
            'name.unique'   => 'This field must be unique',
            'image.image'   => 'This field must be an image',
            'image.mimes'   => 'Image must be a file of type: jpg, jpeg, png, gif, svg, webp.',
        ]);

        $testimonial = new Testimonial();

        // Image Upload for Create Testimonial
        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = rand() . '.' . $image->getClientOriginalName();
            //Image::make($image)->resize(1680,900)->save('upload/slider_images/' . $imageName);
            $image->move(public_path('upload/testimonial_images'), $imageName);
            $image_path = 'upload/testimonial_images/' . $imageName;

            $testimonial->image = $image_path;
        }

        // Creating Testimonial
        $testimonial->name = $request->name;
        $testimonial->profession = $request->profession;
        $testimonial->comment = $request->comment;
        $testimonial->save();

        return back()->with('success', 'Successfully Created your Testimonial');
    }

    /*--------------------------------------------------------------------------
    edit method
    --------------------------------------------------------------------------*/
    public function edit($id)
    {
        $testimonial = Testimonial::find($id);
        return view('backend.testimonial.edit', compact('testimonial'));
    }

    /*--------------------------------------------------------------------------
    update method
    --------------------------------------------------------------------------*/
    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::find($id);

        if ($testimonial) {

            // Validation for Update Testimonial
            $request->validate([
                'name'      => ['required', 'regex:/^[A-Za-z0-9\s]+$/', 'unique:testimonials,name,' . $testimonial->id],
                'comment'   => 'required',
                'image'     => 'image|mimes:jpg,jpeg,png,gif,svg,webp',
            ], [
                '*.required'    => 'This field is required',
                '*.regex'       => 'This field only contain letters, numbers, and spaces.',
                'name.unique'   => 'This field must be unique',
                'image.image'   => 'This field must be an image',
                'image.mimes'   => 'Image must be a file of type: jpg, jpeg, png, gif, svg, webp.',
            ]);

            // Image Upload for Update Testimonial
            if ($request->file('image')) {
                if (File::exists($testimonial->image)) {
                    unlink($testimonial->image);
                }
                $image = $request->file('image');
                $imageName = rand() . '.' . $image->getClientOriginalName();
                //Image::make($image)->resize(1680,900)->save('upload/slider_images/' . $imageName);
                $image->move(public_path('upload/testimonial_images'), $imageName);
                $image_path = 'upload/testimonial_images/' . $imageName;

                $testimonial->image = $image_path;
            }

            // Updating Testimonial
            $testimonial->name = $request->name;
            $testimonial->profession = $request->profession;
            $testimonial->comment = $request->comment;
            $testimonial->save();

            return back()->with('success', 'Successfully Updated your Testimonial');
        }
        else {
            return back()->with('Warning', 'Sorry! Testimonial not found');
        }
    }

    /*--------------------------------------------------------------------------
    destroy method
    --------------------------------------------------------------------------*/
    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);

        if ($testimonial) {
            if (File::exists($testimonial->image)) {
                unlink($testimonial->image);
            }

            $testimonial->delete();

            return back()->with('success', 'Successfully Deleted your Testimonial.');
        } else {
            return back()->with('warning', 'Sorry! Testimonial not found.');
        }
    }
}
