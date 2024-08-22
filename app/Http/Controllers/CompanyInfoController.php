<?php

namespace App\Http\Controllers;

use App\Models\CompanyInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CompanyInfoController extends Controller
{
    
    /*--------------------------------------------------------------------------
    index method
    --------------------------------------------------------------------------*/
    public function index()
    {
        echo "dsagrvrtg";
        // $com_infos = CompanyInfo::first();
        // return "com info page";
        // dd();
        // return view('backend.company.info_view', compact('com_infos'));
    }

    /*--------------------------------------------------------------------------
    edit method
    --------------------------------------------------------------------------*/
    public function edit($id)
    {
        $com_info = CompanyInfo::find($id);
        return view('backend.company.info_edit', compact('com_info'));
    }

    /*--------------------------------------------------------------------------
    update method
    --------------------------------------------------------------------------*/
    public function update(Request $request, $id)
    {
        $com_info = CompanyInfo::find($id);

        if ($com_info) {

            // Validation for Update Conpany Information
            $request->validate([
                'name'      => 'required',
                'phone'     => ['required', 'regex:/^\+?[0-9]\d{1,14}$/'],
                'email'     => 'required | email',
                'location'  => 'required',
                'logo'      => 'required|image|mimes:jpg,jpeg,png,gif,svg,webp',
            ], [
                '*.required'    => 'This field is required',
                'phone.regex'   => 'Please Enter a valid number',
                'email.email'   => 'Please Enter a valid email address',
                'logo.required' => 'This field is required',
                'logo.image'    => 'This field must be an image',
                'logo.mimes'    => 'Image must be a file of type: jpg, jpeg, png, gif, svg, webp.',
            ]);

            // Logo Upload for Update Company Information
            if ($request->file('logo')) {

                $com_logo = File::exists($com_info->logo);
                if ($com_logo != 'seeder_images/company_logo.png') {
                    unlink($com_info->logo);
                }

                $logo = $request->file('logo');
                $logoName = date('d-m-Y-H-i-s') . Str::random('5') . '.' . $logo->getClientOriginalExtension();
                $logo->move(public_path('upload/company_images'), $logoName);
                $logo_path = 'upload/company_images/' . $logoName;

                $com_info->logo = $logo_path;
            }

            // Updating Company Information
            $com_info->name     = $request->name;
            $com_info->phone    = $request->phone;
            $com_info->email    = $request->email;
            $com_info->location = $request->location;
            $com_info->save();

            return back()->with('success', 'Successfully Updated your Company Information');
        }
        else {
            return back()->with('Warning', 'Sorry! Company Information not found');
        }
    }
}
