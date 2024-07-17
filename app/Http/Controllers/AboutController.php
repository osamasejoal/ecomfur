<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

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
            ], [
                '*.required' => 'This field is required',
            ]);

            $about->title       = $request->title;
            $about->description = $request->description;
            $about->save();

            return back()->with('success', 'Successfully Updated your About.');


        } else {
            return back()->with('Warning', 'Sorry! About not found.');
        }

    }
}
