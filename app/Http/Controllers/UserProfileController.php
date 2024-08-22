<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserProfileController extends Controller
{

    /*--------------------------------------------------------------------------
    index method
    --------------------------------------------------------------------------*/
    public function index()
    {
        $user = Auth::user();
        return view('frontend.user_profile.profile', compact('user'));
    }

    /*--------------------------------------------------------------------------
    update method
    --------------------------------------------------------------------------*/
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (auth()) {

            // Validation for Update user profile
            $request->validate([
                'name' => ['required', 'regex:/^[A-Za-z0-9\s]+$/'],
                'phone' => ['nullable', 'regex:/^\+?[0-9]\d{1,14}$/'],
                'birthday' => 'nullable|date|before:today',
                'image' => 'image|mimes:jpg,jpeg,png,gif,svg,webp',
            ], [
                'name.required' => 'This field is required',
                'name.regex' => 'This field only contain letters, numbers, and spaces.',
                'phone.regex' => 'Please enter a valid phone number.',
                'birthday.date' => 'Please enter a valid date.',
                'birthday.before' => 'Please enter a valid Birthday.',
                'image.image' => 'This field must be an image',
                'image.mimes' => 'Image must be a file of type: jpg, jpeg, png, gif, svg, webp.',
            ]);

            // Image Upload for Update user profile
            if ($request->file('image')) {
                if ($user->image != 'seeder_images/default_profile.png') {
                    unlink($user->image);
                }
                $image = $request->file('image');
                $imageName = date('d-m-Y-H-i-s') . Str::random('5') . '.' . $image->getClientOriginalExtension();
                //Image::make($image)->resize(1680,900)->save('upload/slider_images/' . $imageName);
                $image->move(public_path('upload/profile_images'), $imageName);
                $image_path = 'upload/profile_images/' . $imageName;

                $user->image = $image_path;
            }

            // Updating user profile
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->birthday = $request->birthday;
            $user->save();

            return back()->with('success', 'Successfully Updated your Profile');
        } else {
            return back()->with('Warning', 'Sorry! User not found.');
        }
    }

    /*--------------------------------------------------------------------------
    change Password method
    --------------------------------------------------------------------------*/
    public function changePassword(){
        $user = Auth::user();
        return view('frontend.user_profile.password_change', compact('user'));
    }

    /*--------------------------------------------------------------------------
    update Password method
    --------------------------------------------------------------------------*/
    public function updatePassword(Request $request)
    {
        return $request;
        dd();

        // $user = User::auth()->user();

        // if (auth()) {

        //     // Validation for Update user profile
        //     $request->validate([
        //         'current_password' => 'required',
        //         'password' => 'required|min:8|confirmed',
        //     ], [
        //         '*.required' => 'This field is required',
        //         'password.min' => 'New password must be at least 8 characters.',
        //         'password.confirmed' => 'New password confirmation does not match.',
        //     ]);

        //     // Check if the current password matches the user's password
        //     if (!Hash::check($request->current_password, $user->password)) {
        //         // return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        //         return back()->with('error', 'Current password is incorrect.');
        //     }

        //     // Update the user's password
        //     $user->password = Hash::make($request->password);
        //     $user->save();

        //     // Redirect with success message
        //     return back()->with('success', 'Password changed successfully!');
        // } else {
        //     return back()->with('Warning', 'Sorry! User not found.');
        // }
    }

    /*--------------------------------------------------------------------------
    user Orders method
    --------------------------------------------------------------------------*/
    public function userOrders()
    {
        $user = Auth::user()->id;
        $orders = Order::where('user_id', $user)->get();
        return view('frontend.user_profile.user_orders', compact('orders'));
    }

    /*--------------------------------------------------------------------------
    user Orders method
    --------------------------------------------------------------------------*/
    public function orderDetails($id)
    {
        $orderItems = OrderItem::where('order_id', $id)->get();

        return view('frontend.user_profile.order_details', compact(''));
    }
}
