<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
	public function init()
    {
    	$user = Auth::user();

    	return response()->json($user, 200);
    }
    public function register(Request $request)
    {
        $user = User::where('username', $request->username)->first()

        if (isset($user->id))
        {
        	return response()->json(['error' => 'Username already exists.'], 401);
        }

        $user = new User();

        $user->username =  $request->username;
        $user->password = bcrypt($request->password);
        $user->save();

        Auth:login($user);

        return response()->json($user, 200);

    }

    public function login(Request $request)
    {
        if (Auth:attempt(['username' => $request->$email, 'password' => $request->$password], true))
        {
        	return response()->json(Auth::user(), 200);
        }
        else {
        	return response()->json(['error' => 'Credentials doesn\'t Match our records.'], 401);
        }
    }

    public function logout()
    {
        

    }
}
