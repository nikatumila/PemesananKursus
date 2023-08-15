<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course; // Import model Course

class UserController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user(); // Mendapatkan informasi pengguna yang sedang login
        $courses = Course::all();

        return view('user.dashboard', compact('user', 'courses'));
    }
}

