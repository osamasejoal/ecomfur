<?php

namespace App\Http\Controllers;

use App\Models\Supporter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SupporterController extends Controller
{

    /*--------------------------------------------------------------------------
    index method
    --------------------------------------------------------------------------*/
    public function index()
    {
        $supporters = Supporter::all();
        return view('backend.supporter.view', compact('supporters'));
    }

    /*--------------------------------------------------------------------------
    create method
    --------------------------------------------------------------------------*/
    public function create()
    {
        return view('backend.supporter.add');
    }

    /*--------------------------------------------------------------------------
    store method
    --------------------------------------------------------------------------*/
    public function store(Request $request)
    {
        // Validation for Create Supporter
        $request->validate([
            'name'  => 'required|unique:testimonials,name',
            'url'   => 'url',
            'logo'  => 'required|image|mimes:jpg,jpeg,png,gif,svg,webp',
        ], [
            'name.required' => 'This field is required',
            'name.unique'   => 'Name must be unique',
            'url.url'       => 'This field must be URL',
            'logo.required' => 'This field is required',
            'logo.image'    => 'This field must be an image',
            'logo.image'    => 'Image must be a file of type: jpg, jpeg, png, gif, svg, webp.',
        ]);

        $supporter = new Supporter();

        // Image Upload for Create Supporter
        if ($request->file('logo')) {
            $logo = $request->file('logo');
            $logoName = rand() . '.' . $logo->getClientOriginalName();
            $logo->move(public_path('upload/supporter_images'), $logoName);
            $logo_path = 'upload/supporter_images/' . $logoName;

            $supporter->logo = $logo_path;
        }

        // Creating Supporter
        $supporter->name = $request->name;
        $supporter->url = $request->url;
        $supporter->save();

        return back()->with('success', 'Successfully Created your Supporter');
    }

    /*--------------------------------------------------------------------------
    edit method
    --------------------------------------------------------------------------*/
    public function edit($id)
    {
        $supporter = Supporter::find($id);
        return view('backend.supporter.edit', compact('supporter'));
    }

    /*--------------------------------------------------------------------------
    update method
    --------------------------------------------------------------------------*/
    public function update(Request $request, $id)
    {
        $supporter = Supporter::find($id);

        if ($supporter) {

            // Validation for Create Supporter
            $request->validate([
                'name' => ['required', 'unique:supporters,name,' . $supporter->id],
                'url'   => 'active_url',
                'logo'  => 'image|mimes:jpg,jpeg,png,gif,svg,webp',
            ], [
                'name.required' => 'This field is required',
                'name.unique'   => 'Name must be unique',
                'url.active_url'       => 'This field must be URL',
                'logo.image'    => 'This field must be an image',
                'logo.image'    => 'Image must be a file of type: jpg, jpeg, png, gif, svg, webp.',
            ]);

            // Image Upload for Update Supporter
            if ($request->file('logo')) {
                if (File::exists($supporter->logo)) {
                    unlink($supporter->logo);
                }
                $logo = $request->file('logo');
                $logoName = rand() . '.' . $logo->getClientOriginalName();
                $logo->move(public_path('upload/supporter_images'), $logoName);
                $logo_path = 'upload/supporter_images/' . $logoName;

                $supporter->logo = $logo_path;
            }

            // Updating Supporter
            $supporter->name    = $request->name;
            $supporter->url     = $request->url;
            $supporter->save();

            return back()->with('success', 'Successfully Updated your Supporter');
        } else {
            return back()->with('Warning', 'Sorry! Supporter not found');
        }
    }

    /*--------------------------------------------------------------------------
    destroy method
    --------------------------------------------------------------------------*/
    public function destroy($id)
    {
        $supporter = Supporter::find($id);

        if ($supporter) {
            if (File::exists($supporter->logo)) {
                unlink($supporter->logo);
            }

            $supporter->delete();

            return back()->with('success', 'Successfully Deleted your Supporter.');
        } else {
            return back()->with('warning', 'Sorry! Supporter not found.');
        }
    }
}
