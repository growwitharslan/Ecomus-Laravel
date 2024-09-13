<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    //authenticate user

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->passes()) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('account.dashboard')->with('success', 'Login Successfully');
            } else {
                return redirect()->route('account.login')->with('error', 'Invalid Credentials');
            }
        } else {
            return redirect()->route('account.login')->withErrors($validator)->withInput();
        }
    }

    public function register(Request $request)
    {
        return view('register');
    }
    public function processRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);
        if ($validator->passes()) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            $products = product::all();
            $cats = category::all();
            return redirect()->route('account.dashboard', compact('products', 'cats'))->with('success', 'Registration Successfully');
        } else {
            return redirect()->route('account.register')->withErrors($validator)->withInput();
        }
    }
    public function logout()
    {
        Auth::logout();
        $products = product::all();
        $cats = category::all();
        return view('welcome', compact('products', 'cats'))->with('success', 'Logout Successfully');
    }

    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->id);
        //delete product from database
        $user->delete();
        return response()->json(['msg' => 'success', 'response' => 'User deleted successfully.']);
    }
}
