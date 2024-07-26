<?php

namespace App\Http\Controllers;

use App\Models\FrontImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class FrontImageController extends Controller
{
     
    /*--------------------------------------------------------------------------
    index method
    --------------------------------------------------------------------------*/
    public function index()
    {
        $front_img = FrontImage::first();
        return view('frontend.front_image.view', compact('front_img'));
    }

    /*--------------------------------------------------------------------------
    edit method
    --------------------------------------------------------------------------*/
    public function edit($id)
    {
        $front_img = FrontImage::find($id);
        return view('frontend.front_image.edit', compact('front_img'));
    }

    /*--------------------------------------------------------------------------
    update method
    --------------------------------------------------------------------------*/
    public function update(Request $request, $id)
    {
        $front_img = FrontImage::find($id);


        

        if ($front_img) {

            // Validation for Update Front Image
            $request->validate([
                'welcome_title'     => 'required',
                'welcome_desc'      => 'required',
                'welcome_img'       => 'image|mimes:jpg,jpeg,png,gif,svg,webp',
                'gallery_img_1'     => 'image|mimes:jpg,jpeg,png,gif,svg,webp',
                'gallery_img_2'     => 'image|mimes:jpg,jpeg,png,gif,svg,webp',
                'gallery_img_3'     => 'image|mimes:jpg,jpeg,png,gif,svg,webp',
                'gallery_img_4'     => 'image|mimes:jpg,jpeg,png,gif,svg,webp',
                'product_icon_1'    => 'image|mimes:jpg,jpeg,png,gif,svg,webp',
                'product_icon_2'    => 'image|mimes:jpg,jpeg,png,gif,svg,webp',
                'product_icon_3'    => 'image|mimes:jpg,jpeg,png,gif,svg,webp',
                'product_icon_4'    => 'image|mimes:jpg,jpeg,png,gif,svg,webp',
                'product_icon_5'    => 'image|mimes:jpg,jpeg,png,gif,svg,webp',
                'breadcrumb_bg_img' => 'image|mimes:jpg,jpeg,png,gif,svg,webp',
            ], [
                '*.required'    => 'This field is required',
                '*.image'       => 'This field must be an image',
                '*.mimes'       => 'Image must be a file of type: jpg, jpeg, png, gif, svg, webp.',
            ]);


            // Image update for welcome_img
            if ($request->file('welcome_img')) {
                if (File::exists($front_img->welcome_img) && $front_img->welcome_img != 'seeder_images/fi_welcome_img.jpeg') {
                    unlink($front_img->welcome_img);
                }

                $image = $request->file('welcome_img');
                $imageName = date('d-m-Y-H-i-s') . Str::random('5') . '.' . $image->getClientOriginalExtension();
                //Image::make($image)->resize(1680,900)->save('upload/slider_images/' . $imageName);
                $image->move(public_path('upload/front_images'), $imageName);
                $image_path = 'upload/front_images/' . $imageName;

                $front_img->welcome_img = $image_path;
            }

            // Image update for Gallery Image

            // Gallery Image 1
            if ($request->file('gallery_img_1')) {
                if (File::exists($front_img->gallery_img_1) && $front_img->gallery_img_1 != 'seeder_images/fi_gallery_img_1.jpg') {
                    unlink($front_img->gallery_img_1);
                }
                $image = $request->file('gallery_img_1');
                $imageName = date('d-m-Y-H-i-s') . Str::random('5') . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('upload/front_images'), $imageName);
                $image_path = 'upload/front_images/' . $imageName;

                $front_img->gallery_img_1 = $image_path;
            }

            // Gallery Image 2
            if ($request->file('gallery_img_2')) {
                if (File::exists($front_img->gallery_img_2) && $front_img->gallery_img_2 != 'seeder_images/fi_gallery_img_2.jpg') {
                    unlink($front_img->gallery_img_2);
                }
                $image = $request->file('gallery_img_2');
                $imageName = date('d-m-Y-H-i-s') . Str::random('5') . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('upload/front_images'), $imageName);
                $image_path = 'upload/front_images/' . $imageName;

                $front_img->gallery_img_2 = $image_path;
            }

            // Gallery Image 3
            if ($request->file('gallery_img_3')) {
                if (File::exists($front_img->gallery_img_3) && $front_img->gallery_img_3 != 'seeder_images/fi_gallery_img_3.jpg') {
                    unlink($front_img->gallery_img_3);
                }
                $image = $request->file('gallery_img_3');
                $imageName = date('d-m-Y-H-i-s') . Str::random('5') . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('upload/front_images'), $imageName);
                $image_path = 'upload/front_images/' . $imageName;

                $front_img->gallery_img_3 = $image_path;
            }

            // Gallery Image 4
            if ($request->file('gallery_img_4')) {
                if (File::exists($front_img->gallery_img_4) && $front_img->gallery_img_4 != 'seeder_images/fi_gallery_img_4.jpg') {
                    unlink($front_img->gallery_img_4);
                }
                $image = $request->file('gallery_img_4');
                $imageName = date('d-m-Y-H-i-s') . Str::random('5') . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('upload/front_images'), $imageName);
                $image_path = 'upload/front_images/' . $imageName;

                $front_img->gallery_img_4 = $image_path;
            }


            // Image upload for Product Icon

            // Product Icon 1
            if ($request->file('product_icon_1')) {
                if (File::exists($front_img->product_icon_1) && $front_img->product_icon_1 != 'seeder_images/fi_product_icon_1.png') {
                    unlink($front_img->product_icon_1);
                }
                $image = $request->file('product_icon_1');
                $imageName = date('d-m-Y-H-i-s') . Str::random('5') . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('upload/front_images'), $imageName);
                $image_path = 'upload/front_images/' . $imageName;

                $front_img->product_icon_1 = $image_path;
            }

            // Product Icon 2
            if ($request->file('product_icon_2')) {
                if (File::exists($front_img->product_icon_2) && $front_img->product_icon_2 != 'seeder_images/fi_product_icon_2.png') {
                    unlink($front_img->product_icon_2);
                }
                $image = $request->file('product_icon_2');
                $imageName = date('d-m-Y-H-i-s') . Str::random('5') . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('upload/front_images'), $imageName);
                $image_path = 'upload/front_images/' . $imageName;

                $front_img->product_icon_2 = $image_path;
            }

            // Product Icon 3
            if ($request->file('product_icon_3')) {
                if (File::exists($front_img->product_icon_3) && $front_img->product_icon_3 != 'seeder_images/fi_product_icon_3.png') {
                    unlink($front_img->product_icon_3);
                }
                $image = $request->file('product_icon_3');
                $imageName = date('d-m-Y-H-i-s') . Str::random('5') . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('upload/front_images'), $imageName);
                $image_path = 'upload/front_images/' . $imageName;

                $front_img->product_icon_3 = $image_path;
            }

            // Product Icon 4
            if ($request->file('product_icon_4')) {
                if (File::exists($front_img->product_icon_4) && $front_img->product_icon_4 != 'seeder_images/fi_product_icon_4.png') {
                    unlink($front_img->product_icon_4);
                }
                $image = $request->file('product_icon_4');
                $imageName = date('d-m-Y-H-i-s') . Str::random('5') . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('upload/front_images'), $imageName);
                $image_path = 'upload/front_images/' . $imageName;

                $front_img->product_icon_4 = $image_path;
            }

            // Product Icon 5
            if ($request->file('product_icon_5')) {
                if (File::exists($front_img->product_icon_5) && $front_img->product_icon_5 != 'seeder_images/fi_product_icon_5.png') {
                    unlink($front_img->product_icon_5);
                }
                $image = $request->file('product_icon_5');
                $imageName = date('d-m-Y-H-i-s') . Str::random('5') . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('upload/front_images'), $imageName);
                $image_path = 'upload/front_images/' . $imageName;

                $front_img->product_icon_5 = $image_path;
            }

            // Breadcrumb Background Image
            if ($request->file('breadcrumb_bg_img')) {
                if (File::exists($front_img->breadcrumb_bg_img) && $front_img->breadcrumb_bg_img != 'seeder_images/fi_breadcrumb_bg_img.jpeg') {
                    unlink($front_img->breadcrumb_bg_img);
                }
                $image = $request->file('breadcrumb_bg_img');
                $imageName = date('d-m-Y-H-i-s') . Str::random('5') . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('upload/front_images'), $imageName);
                $image_path = 'upload/front_images/' . $imageName;

                $front_img->breadcrumb_bg_img = $image_path;
            }

            $front_img->welcome_title = $request->welcome_title;
            $front_img->welcome_desc  = $request->welcome_desc;
            $front_img->save();

            return back()->with('success', 'Successfully Updated your Front Image');
        }
        else {
            return back()->with('Warning', 'Sorry! Front Image not found');
        }
    }
}
