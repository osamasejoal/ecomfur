<?php

namespace App\Http\Controllers;

use App\Models\FrontImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FrontImageController extends Controller
{
     
    /*--------------------------------------------------------------------------
    index method
    --------------------------------------------------------------------------*/
    public function index()
    {
        $front_images = FrontImage::first();
        return view('frontend.front_image.view', compact('front_images'));
    }

    /*--------------------------------------------------------------------------
    edit method
    --------------------------------------------------------------------------*/
    public function edit($id)
    {
        $front_image = FrontImage::find($id);
        return view('frontend.front_image.edit', compact('front_image'));
    }

    /*--------------------------------------------------------------------------
    update method
    --------------------------------------------------------------------------*/
    public function update(Request $request, $id)
    {
        $front_image = FrontImage::find($id);

        if ($front_image) {

            // Validation for Update Front Image
            $request->validate([
                'welcolme_or_offer_image'   => 'image|mimes:jpg,jpeg,png,gif,svg,webp',
                'gallery_image_1'           => 'image|mimes:jpg,jpeg,png,gif,svg,webp',
                'gallery_image_2'           => 'image|mimes:jpg,jpeg,png,gif,svg,webp',
                'gallery_image_3'           => 'image|mimes:jpg,jpeg,png,gif,svg,webp',
                'gallery_image_4'           => 'image|mimes:jpg,jpeg,png,gif,svg,webp',
                'product_icon_1'            => 'image|mimes:jpg,jpeg,png,gif,svg,webp',
                'product_icon_2'            => 'image|mimes:jpg,jpeg,png,gif,svg,webp',
                'product_icon_3'            => 'image|mimes:jpg,jpeg,png,gif,svg,webp',
                'product_icon_4'            => 'image|mimes:jpg,jpeg,png,gif,svg,webp',
                'product_icon_5'            => 'image|mimes:jpg,jpeg,png,gif,svg,webp',
            ], [
                'welcolme_or_offer_image.image' => 'This field must be an image',
                'gallery_image_1.image'         => 'This field must be an image',
                'gallery_image_2.image'         => 'This field must be an image',
                'gallery_image_3.image'         => 'This field must be an image',
                'gallery_image_4.image'         => 'This field must be an image',
                'product_icon_1.image'          => 'This field must be an image',
                'product_icon_2.image'          => 'This field must be an image',
                'product_icon_3.image'          => 'This field must be an image',
                'product_icon_4.image'          => 'This field must be an image',
                'product_icon_5.image'          => 'This field must be an image',
                'welcolme_or_offer_image.mimes' => 'Image must be a file of type: jpg, jpeg, png, gif, svg, webp.',
                'gallery_image_1.mimes'         => 'Image must be a file of type: jpg, jpeg, png, gif, svg, webp.',
                'gallery_image_2.mimes'         => 'Image must be a file of type: jpg, jpeg, png, gif, svg, webp.',
                'gallery_image_3.mimes'         => 'Image must be a file of type: jpg, jpeg, png, gif, svg, webp.',
                'gallery_image_4.mimes'         => 'Image must be a file of type: jpg, jpeg, png, gif, svg, webp.',
                'product_icon_1.mimes'          => 'Image must be a file of type: jpg, jpeg, png, gif, svg, webp.',
                'product_icon_2.mimes'          => 'Image must be a file of type: jpg, jpeg, png, gif, svg, webp.',
                'product_icon_3.mimes'          => 'Image must be a file of type: jpg, jpeg, png, gif, svg, webp.',
                'product_icon_4.mimes'          => 'Image must be a file of type: jpg, jpeg, png, gif, svg, webp.',
                'product_icon_5.mimes'          => 'Image must be a file of type: jpg, jpeg, png, gif, svg, webp.',
            ]);

            // Image update for welcolme_or_offer_image
            if ($request->file('welcolme_or_offer_image')) {
                if (File::exists($front_image->welcolme_or_offer_image) && $front_image->welcolme_or_offer_image != 'seeder_images/front_image_welcolme_or_offer_image.jpg') {
                    unlink($front_image->welcolme_or_offer_image);
                }

                $image = $request->file('welcolme_or_offer_image');
                $imageName = rand() . '.' . $image->getClientOriginalName();
                //Image::make($image)->resize(1680,900)->save('upload/slider_images/' . $imageName);
                $image->move(public_path('upload/front_images'), $imageName);
                $image_path = 'upload/front_images/' . $imageName;

                $front_image->welcolme_or_offer_image = $image_path;
            }


            // Image update for Gallery Image

            // Gallery Image 1
            if ($request->file('gallery_image_1')) {
                if (File::exists($front_image->gallery_image_1) && $front_image->gallery_image_1 != 'seeder_images/front_image_gallery_image_1.jpg') {
                    unlink($front_image->gallery_image_1);
                }
                $image = $request->file('gallery_image_1');
                $imageName = rand() . '.' . $image->getClientOriginalName();
                $image->move(public_path('upload/front_images'), $imageName);
                $image_path = 'upload/front_images/' . $imageName;

                $front_image->gallery_image_1 = $image_path;
            }

            // Gallery Image 2
            if ($request->file('gallery_image_2')) {
                if (File::exists($front_image->gallery_image_2) && $front_image->gallery_image_2 != 'seeder_images/front_image_gallery_image_2.jpg') {
                    unlink($front_image->gallery_image_2);
                }
                $image = $request->file('gallery_image_2');
                $imageName = rand() . '.' . $image->getClientOriginalName();
                $image->move(public_path('upload/front_images'), $imageName);
                $image_path = 'upload/front_images/' . $imageName;

                $front_image->gallery_image_2 = $image_path;
            }

            // Gallery Image 3
            if ($request->file('gallery_image_3')) {
                if (File::exists($front_image->gallery_image_3) && $front_image->gallery_image_3 != 'seeder_images/front_image_gallery_image_3.jpg') {
                    unlink($front_image->gallery_image_3);
                }
                $image = $request->file('gallery_image_3');
                $imageName = rand() . '.' . $image->getClientOriginalName();
                $image->move(public_path('upload/front_images'), $imageName);
                $image_path = 'upload/front_images/' . $imageName;

                $front_image->gallery_image_3 = $image_path;
            }

            // Gallery Image 4
            if ($request->file('gallery_image_4')) {
                if (File::exists($front_image->gallery_image_4) && $front_image->gallery_image_4 != 'seeder_images/front_image_gallery_image_4.jpg') {
                    unlink($front_image->gallery_image_4);
                }
                $image = $request->file('gallery_image_4');
                $imageName = rand() . '.' . $image->getClientOriginalName();
                $image->move(public_path('upload/front_images'), $imageName);
                $image_path = 'upload/front_images/' . $imageName;

                $front_image->gallery_image_4 = $image_path;
            }


            // Image upload for Product Icon

            // Product Icon 1
            if ($request->file('product_icon_1')) {
                if (File::exists($front_image->product_icon_1) && $front_image->product_icon_1 != 'seeder_images/front_image_product_icon_1.png') {
                    unlink($front_image->product_icon_1);
                }
                $image = $request->file('product_icon_1');
                $imageName = rand() . '.' . $image->getClientOriginalName();
                $image->move(public_path('upload/front_images'), $imageName);
                $image_path = 'upload/front_images/' . $imageName;

                $front_image->product_icon_1 = $image_path;
            }

            // Product Icon 2
            if ($request->file('product_icon_2')) {
                if (File::exists($front_image->product_icon_2) && $front_image->product_icon_2 != 'seeder_images/front_image_product_icon_2.png') {
                    unlink($front_image->product_icon_2);
                }
                $image = $request->file('product_icon_2');
                $imageName = rand() . '.' . $image->getClientOriginalName();
                $image->move(public_path('upload/front_images'), $imageName);
                $image_path = 'upload/front_images/' . $imageName;

                $front_image->product_icon_2 = $image_path;
            }

            // Product Icon 3
            if ($request->file('product_icon_3')) {
                if (File::exists($front_image->product_icon_3) && $front_image->product_icon_3 != 'seeder_images/front_image_product_icon_3.png') {
                    unlink($front_image->product_icon_3);
                }
                $image = $request->file('product_icon_3');
                $imageName = rand() . '.' . $image->getClientOriginalName();
                $image->move(public_path('upload/front_images'), $imageName);
                $image_path = 'upload/front_images/' . $imageName;

                $front_image->product_icon_3 = $image_path;
            }

            // Product Icon 4
            if ($request->file('product_icon_4')) {
                if (File::exists($front_image->product_icon_4) && $front_image->product_icon_4 != 'seeder_images/front_image_product_icon_4.png') {
                    unlink($front_image->product_icon_4);
                }
                $image = $request->file('product_icon_4');
                $imageName = rand() . '.' . $image->getClientOriginalName();
                $image->move(public_path('upload/front_images'), $imageName);
                $image_path = 'upload/front_images/' . $imageName;

                $front_image->product_icon_4 = $image_path;
            }

            // Product Icon 5
            if ($request->file('product_icon_5')) {
                if (File::exists($front_image->product_icon_5) && $front_image->product_icon_5 != 'seeder_images/front_image_product_icon_5.png') {
                    unlink($front_image->product_icon_5);
                }
                $image = $request->file('product_icon_5');
                $imageName = rand() . '.' . $image->getClientOriginalName();
                $image->move(public_path('upload/front_images'), $imageName);
                $image_path = 'upload/front_images/' . $imageName;

                $front_image->product_icon_5 = $image_path;
            }

            $front_image->save();

            return back()->with('success', 'Successfully Updated your Front Image');
        }
        else {
            return back()->with('Warning', 'Sorry! Front Image not found');
        }
    }
}
