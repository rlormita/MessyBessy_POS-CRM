<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Foundation\Auth\ConfirmsPasswords;
// use App\Providers\RouteServiceProvider;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;

class ProfileController extends Controller
{
    use ConfirmsPasswords;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('profile');
    }

    public function edit(){

        return view('profile.editProfile');

    }

    public function update(Request $request){
        $user = Auth::user();



        $data = $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'password_confirmation' => 'required|min:6'

        ]);


        $user->firstName = $data['firstName'];
        $user->lastName = $data['lastName'];
        $user->email = $data['email'];


        // $password_confirmation = $request->input['password'];
        if (Hash::check($data['password_confirmation'], Auth::user()->password)) {
            $user->save();
            return back()->withPasswordStatus('Updated profile successfully updated.');
         }

        }


    public function upload(Request $request){

        request()->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);

        if($request->hasFile('profile_image')){
            $profile_image = $request->file('profile_image');
            $filename = time() . '.' . $profile_image->getClientOriginalExtension();
            Image::make($profile_image)->resize(300, 300)->save( public_path('/img/uploads/profile_image/' . $filename));
        }


        $user = Auth::user();
        $user->profile_image = $filename;

        $user->save();

        return view('profile');
     }

        /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(Request $request)
    {
        Auth::user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus('Password successfully updated.');
    }
}

