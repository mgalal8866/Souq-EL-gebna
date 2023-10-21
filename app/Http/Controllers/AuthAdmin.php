<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthAdmin extends Controller
{
    function index()
    {

        return view('dashboard.admin.login');
    }
    function postlogin(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('/')
                ->withSuccess('Signed in');
        } else {
            // return redirect("login")->withSuccess('Login details are not valid');
            return redirect()->back()->withSuccess('Login details are not valid');
        }
    }
    public function logout()
    {
        Session::flush();
        Auth::guard('admin')->logout();

        return Redirect('login');
    }
}
