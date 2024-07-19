<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Size;
use Illuminate\Support\Facades\File;

class SizeController extends Controller
{
     
    /*--------------------------------------------------------------------------
    index method
    --------------------------------------------------------------------------*/
    public function index()
    {
        $sizes = Size::all();
        return view('backend.size.view', compact('sizes'));  
    }

    /*--------------------------------------------------------------------------
    create method
    --------------------------------------------------------------------------*/
    public function create()
    {
        return view('backend.size.add');
    }

    /*--------------------------------------------------------------------------
    store method
    --------------------------------------------------------------------------*/
    public function store(Request $request)
    {
        // Validation for Create Size
        $request->validate([
            'title' => 'required|unique:sizes,title',
        ], [
            'title.required'    => 'This field is required',
            'title.unique'      => 'This field is must be unique'
        ]);


        $size = new Size();
        
        // Creating Size
        $size->title   = $request->title;
        $size->save();

        return back()->with('success', 'Successfully Created your Size');
    }

    /*--------------------------------------------------------------------------
    destroy method
    --------------------------------------------------------------------------*/
    public function destroy($id)
    {
        $size = Size::find($id);

        if ($size) {

            $size->delete();

            return back()->with('success', 'Successfully Deleted your Size.');
        } else {
            return back()->with('warning', 'Sorry! Size not found.');
        }
    }
}
