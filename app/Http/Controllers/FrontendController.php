<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Product;


class FrontendController extends Controller
{
    public function index(){
        $services = Service::all();
        $products = Product::all();

        return view('frontend.index', compact('products', 'services'));
    }
}
