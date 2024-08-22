<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /*--------------------------------------------------------------------------
    index method
    --------------------------------------------------------------------------*/
    public function index()
    {
        $about = About::first();
        $about->images = json_decode($about->images);
        return view('backend.about.view', compact('about'));
    }

    /*--------------------------------------------------------------------------
    edit method
    --------------------------------------------------------------------------*/
    public function edit($id)
    {
        $about = About::find($id);
        return view('backend.about.edit', compact('about'));
    }
    
    /*--------------------------------------------------------------------------
    update method
    --------------------------------------------------------------------------*/
    public function update(Request $request, $id)
    {
        $about = About::find($id);
        
        if ($about) {
            
            // Validation for Update About
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'images.*' => 'image|mimes:jpg,jpeg,png,gif,svg,webp',
            ], [
                '*.required' => 'This field is required',
                'images.*.image' => 'This field must be an image',
                'images.*.mimes' => 'Image must be a file of type: jpg, jpeg, png, gif, svg, webp.',
            ]);
            
            // Images Upload for Update About
            $images = [];
            
            // Check if images already exist, if so, decode them
            if ($about->images) {
                $images = json_decode($about->images, true);
            }

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $filename = date('d-m-Y-H-i-s') . Str::random('5') . '.' . $image->getClientOriginalExtension();
                    $path = 'upload/about_images/' . $filename;
                    $image->move(public_path('upload/about_images'), $filename);
                    
                    $images[] = $path;
                }
            }
            
            $about->images = json_encode($images);
            $about->title = $request->title;
            $about->description = $request->description;
            $about->save();
            
            return back()->with('success', 'Successfully Updated your About.');
            
        } else {
            return back()->with('Warning', 'Sorry! About not found.');
        }
        
    }
    
        /*--------------------------------------------------------------------------
        delete Image method
        --------------------------------------------------------------------------*/
        public function deleteImage(Request $request)
        {
            $request->validate([
                'image' => 'required|string',
            ]);
        
            $about = About::first();
        
            // Decode the current JSON images
            $images = json_decode($about->images, true) ?? [];
        
            // Remove the image from the array
            $images = array_filter($images, function($img) use ($request) {
                return $img !== $request->image;
            });
        
            // Delete the image file
            Storage::disk('public')->delete($request->image);
        
            // Update the database with the new images array
            $about->images = json_encode(array_values($images));
            $about->save();
        
            return redirect()->back()->with('success', 'Image deleted successfully!');
        }
}
