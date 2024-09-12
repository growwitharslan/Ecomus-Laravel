<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('admin/login');
    }
    //authenticate admin

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->passes()) {
            $admin = Admin::where('email', $request->email)->first();
            if ($admin && Hash::check($request->password, $admin->password)) {
                Auth::guard('admin')->login($admin);
                return redirect()->route('admin.dashboard')->with('success', 'Login Successfully');
            } else {
                return redirect()->route('admin.login')->with('error', 'Invalid Credentials');
            }
        } else {
            return redirect()->route('admin.login')->withErrors($validator)->withInput();
        }
    }

    public function register(Request $request)
    {
        return view('admin/register');
    }
    public function processRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);
        if ($validator->passes()) {
            $admin = new Admin();
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->password = Hash::make($request->password);
            $admin->save();
            return redirect()->route('admin.dashboard')->with('success', 'Registration Successfully');
        } else {
            return redirect()->route('admin.register')->withErrors($validator)->withInput();
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login')->with('success', 'Logout Successfully');
    }
}
