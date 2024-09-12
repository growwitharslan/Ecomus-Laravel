<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')->get();

        return view('admin.users', [
            'users' => $users
        ]);
    }

    public function show(Request $request)
   {
      $user = User::findOrFail($request->id);
      if (!empty($user)) {
         $htmlresult = view('admin/user_show_ajax', compact('user'))->render();
         $finalResult = response()->json(['msg' => 'success', 'response' => $htmlresult]);
         return $finalResult;
      } else {
         return response()->json(['msg' => 'error', 'response' => 'Product not found.']);
      }
   }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['msg' => 'lvl_error', 'response' => $validator->errors()->all()]);
        }

        $user = User::findOrFail($request->id);

        if ($user) {
            $user->name = $request->name;
            $user->email = $request->email;
            // Save User
            if ($user->save()) {
                return response()->json(['msg' => 'success', 'response' => 'User updated successfully!', 'product' => $user], 200);
            } else {
                return response()->json(['msg' => 'error', 'response' => 'Failed to update User!'], 400);
            }
        } else {
            return response()->json(['msg' => 'error', 'response' => 'User not found.'], 404);
        }
    }
}
