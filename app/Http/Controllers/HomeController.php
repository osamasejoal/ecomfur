<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function adminDashboard() {
        return view('backend.admin_index');
    }

    public function moderatorDashboard() {
        return view('backend.moderator_index');
    }
}
