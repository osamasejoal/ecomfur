<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
     
    /*--------------------------------------------------------------------------
    index method
    --------------------------------------------------------------------------*/
    public function index()
    {
        $services = Service::all();
        return view('frontend.service.view', compact('services'));
    }

    /*--------------------------------------------------------------------------
    edit method
    --------------------------------------------------------------------------*/
    public function edit($id)
    {
        $service = Service::find($id);
        return view('frontend.service.edit', compact('service'));
    }

    /*--------------------------------------------------------------------------
    update method
    --------------------------------------------------------------------------*/
    public function update(Request $request, $id)
    {
        $service = Service::find($id);

        if ($service) {

            // Validation for Update Service
            $request->validate([
                'title'     => 'required',
                'sub_title' => 'required',
                'icon'     => 'required|image|mimes:jpg,jpeg,png,gif,svg,webp',
            ], [
                '*.required'        => 'This field is required',
                'icon.required'    => 'This field is required',
                'icon.image'       => 'This field must be an image',
                'icon.mimes'       => 'Image must be a file of type: jpg, jpeg, png, gif, svg, webp.',
            ]);

            // Icon Upload for Update Service
            if ($request->file('icon')) {

                $s_icon = File::exists($service->icon);
                if ($s_icon != 'seeder_images/service_icon_1.png' || $s_icon != 'seeder_images/service_icon_2.png' || $s_icon != 'seeder_images/service_icon_3.png') {
                    unlink($service->icon);
                }

                $icon = $request->file('icon');
                $iconName = date('d-m-Y-H-i-s') . Str::random('5') . '.' . $icon->getClientOriginalExtension();
                $icon->move(public_path('upload/service_images'), $iconName);
                $icon_path = 'upload/service_images/' . $iconName;

                $service->icon = $icon_path;
            }

            // Updating Service
            $service->title     = $request->title;
            $service->sub_title = $request->sub_title;
            $service->save();

            return back()->with('success', 'Successfully Updated your Service');
        }
        else {
            return back()->with('Warning', 'Sorry! Service not found');
        }
    }
}
