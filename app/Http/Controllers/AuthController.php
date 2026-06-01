<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function adminLogin()
    {
        return view('backend.admin-login');
    }

    public function adminLogout()
    {
        Auth::logout();

        return redirect('/admin/login');
    }
}