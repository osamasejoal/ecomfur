<?php

namespace App\Http\Controllers;

use App\Models\CompanySocial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CompanySocialController extends Controller
{
     
    /*--------------------------------------------------------------------------
    index method
    --------------------------------------------------------------------------*/
    public function index()
    {
        $com_socials = CompanySocial::all();
        return view('backend.company.social_view', compact('com_socials'));
    }

    /*--------------------------------------------------------------------------
    edit method
    --------------------------------------------------------------------------*/
    public function edit($id)
    {
        $com_social = CompanySocial::find($id);
        return view('backend.company.social_edit', compact('com_social'));
    }

    /*--------------------------------------------------------------------------
    update method
    --------------------------------------------------------------------------*/
    public function update(Request $request, $id)
    {
        $com_social = CompanySocial::find($id);

        if ($com_social) {

            // Validation for Update Company Social
            $request->validate([
                'name'      => 'required',
                'link'     => 'required | url | active_url',
                'icon'     => 'required',
            ], [
                '*.required'        => 'This field is required',
                'link.url'          => 'Please enter a valid link',
                'link.active_url'   => 'Please enter a valid link',
            ]);

            // Updating Company Social
            $com_social->name   = $request->name;
            $com_social->link   = $request->link;
            $com_social->icon   = $request->icon;
            $com_social->save();

            return back()->with('success', 'Successfully Updated your Company Social Media');
        }
        else {
            return back()->with('Warning', 'Sorry! Company Social Media not found');
        }
    }
}
