<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
     
    /*--------------------------------------------------------------------------
    index method
    --------------------------------------------------------------------------*/
    public function index()
    {
        $reviews = Review::all();
        return view('frontend.review.view', compact('reviews'));
    }

    /*--------------------------------------------------------------------------
    store method
    --------------------------------------------------------------------------*/
    public function store(Request $request, $slug)
    {
        // Validation for Create Review
        $request->validate([
            'rating' => 'integer|min:1|max:5'
        ], [
            'rating.integer'    => 'This field must be an integer',
            'rating.min'        => 'The minimum value for this field is 1',
            'rating.max'        => 'The maximum value for this field is 5',
        ]);

        $review = new Review();

        // Creating Review
        $review->user_id        = auth()->id();
        $review->product_id     = Product::where('slug', $slug)->first()->id;
        $review->comment        = $request->comment;
        $review->rating         = $request->rating;
        $review->save();

        return back()->with('success', 'Thank you for your feedback!');
    }

    /*--------------------------------------------------------------------------
    update method
    --------------------------------------------------------------------------*/
    public function update(Request $request, $id)
    {
        $review = Review::find($id);

        if ($review) {

            // Updating Review
            $review->reply = $request->reply;
            $review->save();

            return back()->with('success', 'Successfully Replied the Review');
        }
        else {
            return back()->with('Warning', 'Sorry! Review not found');
        }
    }

    /*--------------------------------------------------------------------------
    destroy method
    --------------------------------------------------------------------------*/
    public function destroy($id)
    {
        $review = review::find($id);

        if ($review) {

            $review->delete();

            return back()->with('success', 'Successfully Deleted the Review.');
        } else {
            return back()->with('warning', 'Sorry! Review not found.');
        }
    }
}
