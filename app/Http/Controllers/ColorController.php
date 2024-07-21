<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;
use Illuminate\Support\Facades\File;

class ColorController extends Controller
{
     
    /*--------------------------------------------------------------------------
    index method
    --------------------------------------------------------------------------*/
    public function index()
    {
        $colors = Color::all();
        return view('backend.color.view', compact('colors'));
    }

    /*--------------------------------------------------------------------------
    create method
    --------------------------------------------------------------------------*/
    public function create()
    {
        return view('backend.color.add');
    }

    /*--------------------------------------------------------------------------
    store method
    --------------------------------------------------------------------------*/
    public function store(Request $request)
    {
        // Validation for Create Color
        $request->validate([
            'title' => ['required', 'regex:/^[A-Za-z0-9\s]+$/'],
            'code'  => 'required|unique:colors,code',
        ], [
            '*.required'    => 'This field is required',
            'title.regex'   => 'This field only contain letters, numbers, and spaces.',
            'code.unique'   => 'This field must be unique',
        ]);


        $color = new Color();
        
        // Creating Color
        $color->title   = $request->title;
        $color->code    = $request->code;
        $color->save();

        return back()->with('success', 'Successfully Created your Color');
    }

    /*--------------------------------------------------------------------------
    destroy method
    --------------------------------------------------------------------------*/
    public function destroy($id)
    {
        $color = Color::find($id);

        if ($color) {

            $color->delete();

            return back()->with('success', 'Successfully Deleted your Color.');
        } else {
            return back()->with('warning', 'Sorry! Color not found.');
        }
    }
}
