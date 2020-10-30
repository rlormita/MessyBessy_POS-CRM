<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class CashierLoginController extends Controller
{

    protected $redirectTo = RouteServiceProvider::CASHIER;


    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showLoginForm() {
        return view('auth.cashier-login');
    }

    public function login(Request $request){
        //validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $credentials = $request->only('email', 'password', 'remember_token');

        //Attempt to log the user in
        if (Auth::guard('cashier')->attempt($credentials)) {

        //if successful, then redirect to their intended location

                return view('cashier');
                // return redirect()->intended(route('cashier.dashboard'));
            }

            //if unsuccessful, then redirect back to the login with the form data

        return redirect()->back()->withInput($request->only('email', 'remember_token'));
    }
}
